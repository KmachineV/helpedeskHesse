<?php

namespace App\Imports;

use App\Projects;
use App\User;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use phpseclib3\Crypt\Hash;

class UsersImport implements ToCollection, WithHeadingRow
{
    private $projects;
    public function __construct()
    {
        $this->projects = Projects::pluck('id', 'code');
    }

    /**
    * @param Collection $rows
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        $arrayRol = array(3);
        foreach ($rows as $row)
        {

            $data=[
             'first_name'=> $row['nombre'],
            'last_name' => $row['apellido'],
            'rut'       => $row['rut'],
            'password'  => encrypt($row['contrasena']),
            'email'     => $row['correo'],
            'projectId' => $this->projects[$row['proyecto']]

            ];

           $user = User::create($data);

           $user->roles()->sync($arrayRol);

          }
        return $rows;
    }
}
