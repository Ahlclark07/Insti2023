<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\models\User;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createEtudiant()
    {

        $etudiantsIds = DB::table("user_data_type")->where("data_type_id", $this->getRoleIdOf("etudiant"))->pluck("user_id");
        $etudiants = User::whereIn("id", $etudiantsIds)->paginate(5);

        return view('admin/dashboard/ajouter-etudiant')->with('id', $this->getRoleIdOf("etudiant"))->with('etudiants', $etudiants);
        //
    }
    public function createEtudiants()
    {

        return view('admin/dashboard/ajouter-etudiants')->with('id', $this->getRoleIdOf("etudiant"));
        //
    }
    public function createProfesseur()
    {
        $professeursIds = DB::table("user_data_type")->where("data_type_id", $this->getRoleIdOf("enseignant"))->pluck("user_id");
        $professeurs = User::whereIn("id", $professeursIds)->paginate(5);

        return view('admin/dashboard/ajouter-professeur')->with('id', $this->getRoleIdOf("enseignant"))->with("professeurs", $professeurs);
        //
    }
    public function createProfesseurs()
    {
        return view('admin/dashboard/ajouter-professeurs')->with('id', $this->getRoleIdOf("enseignant"));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        RoleController::setRole($user, [$request->type]);
        return redirect()->route($request->type == $this->getRoleIdOf("etudiant") ? 'admin.ajoutetudiant' : 'admin.ajoutetudiant')
            ->with('message', "Compte de " . $request->name . " créé(e) avec succès")->with("id", $request->type);
    }

    private function getRoleIdOf($name)
    {
        $id = DB::table("table_globals")->where("data_type", "user")->where("data_cat", $name)->pluck("id")->first();
        return $id;
    }

    public function storeWithFile(Request $request)
    {
        Excel::import(new UsersImport($request->type), $request->fichierExcel);

        return redirect('/')->with('success', 'All good!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
