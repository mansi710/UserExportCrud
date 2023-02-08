<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'id' => 1,
                'name' => 'Mansi',
                'isAdmin' => 0,
                'profile_image'=>'null',
                'email' => '7.mansi.10@gmail.com',
                'password' => Hash::make('123456789'),
            ]

        );
    }
}
