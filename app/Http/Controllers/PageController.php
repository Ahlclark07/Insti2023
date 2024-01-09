<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function getProfesseurs()
    {
        $professeursIds = DB::table("user_data_type")->where("data_type_id", AdminController::getRoleIdOf("enseignant"))->pluck("user_id");
        $professeurs = User::whereIn("id", $professeursIds)->get();

        return view("liste-professeurs")->with("professeurs", $professeurs);
    }
    public function getProfesseur($id)
    {
        $professeur = User::where("id", $id)->get();
        return view("professeur")->with("professeur", $professeur);
    }
}
