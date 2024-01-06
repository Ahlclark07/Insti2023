<?php

namespace App\Imports;

use App\Http\Controllers\RoleController;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel
{

    private $id_role;

    public function __construct($id_role)
    {
        $this->id_role = $id_role;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {



        $nom = $row[0];
        $email = $row[1];
        if ($nom && $email) {

            $user = User::create([
                'name' => $nom,
                'email' => $email,
                'password' => Hash::make($email)
            ]);

            RoleController::setRole($user, [$this->id_role]);
        }


        return null;
    }
}
