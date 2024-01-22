<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function edit(Request $request)
    {
        $grades = Grade::all();
        $themes_de_recherches =  $request->user()->theme_de_recherche;
        $distinctions =  $request->user()->distinctions;
        return view("edition-profil")
            ->with('grades', $grades)
            ->with('distinctions', $distinctions)
            ->with('themes_de_recherches', $themes_de_recherches);
    }

    public function save(Request $request){
        $user = $request->user();
        $validationArray =($user->roles()->contains('etudiant'))?
            [
                "nom" =>["required", "string"],
                "prenoms" => ["required", "string"],
                "filiere" => ["required", "string"],
                "date_de_naissance" => ["required", "date"],
                "photo_de_profil" => "nullable|image"
            ] :
            [
                "nom" =>["required", "string"],
                "prenoms" => ["required", "string"],
                "grade" => ["required", "string"],
                "date_de_naissance" => ["required", "date"],
                "specialite" => ["required", "string"],
                "photo_de_profil" => "nullable|image"
            ];
        $this->validate($request, $validationArray);
        $photo = $user->profil?->photo;
        if($request->photo_de_profil){
            $fileNameWithExt = $request->file('photo_de_profil')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo_de_profil')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            if($user->profil?->photo)
                Storage::delete('public/usersImages/'.$user->profil?->photo);
            $path = $request->file('photo_de_profil')->storeAs('public/usersImages', $fileNameToStore);
            $photo = $fileNameToStore;
        }

        $profilArray =($user->roles()->contains('etudiant'))?
            [
                'nom' => $request->nom,
                'prenom' => $request->prenoms,
                'filiere' => $request->filiere,
                'date_de_naissance' => $request->date_de_naissance,
                'photo' => $photo,
            ]:
            [
                'nom' => $request->nom,
                'prenom' => $request->prenoms,
                'specialite' => $request->specialite,
                'date_de_naissance' => $request->date_de_naissance,
                'photo' => $photo,
            ];

        $user->profil()->updateOrCreate(['user_id'=>$user->id], $profilArray);

        if($user->roles()->contains('enseignant'))
            $user->grade()->sync($request->grade);

        $user->name =  $request->prenoms.' '.$request->nom;
        $user->update();
        return redirect()->route("update.profil");
    }

    public function saveResearch(Request $request){
        $user = $request->user();
        $this->validate($request, ['theme_de_recherche'=>'required']);
        $user->theme_de_recherche()->create(['nom'=>$request->theme_de_recherche]);
        return redirect()->route("edit.research");
    }

    public function updateResearch(Request $request){
        $this->validate($request, ['theme_de_recherche'=>'required']);
        $theme = \App\Models\Theme_de_recherches::find($request->input('theme_id'));
        $theme->nom=$request->theme_de_recherche;
        $theme->update();
        return redirect()->route("edit.research");
    }

    public function deleteResearch($id){
        $disponibilite = \App\Models\Theme_de_recherches::find($id);
        $disponibilite->delete();
        return redirect()->route("edit.research");
    }

    public function saveDistinctions(Request $request){
        $user = $request->user();
        $this->validate($request, ['nom_distinction'=>'required',
                                    'annee_distinction'=>'required',
                                    'lieu_distinction'=>'required',
                                    'institut_distinction'=>'required']);
        $user->distinctions()->create(['nom_distinction'=>$request->nom_distinction,
                                        'annee'=>$request->annee_distinction,
                                        'lieu'=>$request->lieu_distinction,
                                        'institut'=>$request->institut_distinction]);
        return redirect()->route("edit.distinctions");
    }

    public function updateDistinctions(Request $request){
        $this->validate($request, ['nom_distinction'=>'required',
        'annee_distinction'=>'required',
        'lieu_distinction'=>'required',
        'institut_distinction'=>'required']);
        $distinction = \App\Models\distinctions::find($request->input('distinction_id'));
        $distinction->nom_distinction=$request->nom_distinction;
        $distinction->annee=$request->annee_distinction;
        $distinction->lieu=$request->lieu_distinction;
        $distinction->institut=$request->institut_distinction;
        $distinction->update();
        return redirect()->route("edit.distinctions");
    }

    public function deleteDistinctions($id){
        $distinction = \App\Models\distinctions::find($id);
        $distinction->delete();
        return redirect()->route("edit.distinctions");
    }
}
