<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        if ($user->roles()->contains('admin'))
            return redirect()->route('admin');
        return view("edition-profil");
    }
}
