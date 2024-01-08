<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Grade;
class ProfilController extends Controller
{
    public function edit()
    {
        $grades = Grade::all();
        return view("edition-profil")->with('grades', $grades);
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
}
