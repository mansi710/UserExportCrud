<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return User::select("id", "name","profile_image","email","isAdmin")->get();
        // return User::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Name","Profile Image", "Email", "IsAdmin"];

        return[
            'Id',
            'Name',
            'Profile Image',
            'Email',
            'Is Admin',                       
        ];
    }

    
}
