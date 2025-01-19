<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $data = User::create([
        //     'name' => 'Kota Manado',
        //     'email' => 'pemkotmanado@jsx.com',
        //     'username' => 'pemkotmdo',
        //     'password' => bcrypt(12345678)
        // ]);
        // $data->assignRole('admin');

        // $data = User::create([
        //     'name' => 'Andrei Angouw',
        //     'email' => 'walikotamanado@gmail.com',
        //     'username' => 'walikotamdo',
        //     'password' => bcrypt(12345678)
        // ]);
        // $data->assignRole('walikota');

        $data = User::create([
            'name' => 'Richard Henry Marthen Sualang',
            'email' => 'wakilwalikotamanado@gmail.com',
            'username' => 'wakilwalikotamdo',
            'password' => bcrypt(12345678)
        ]);
        $data->assignRole('walikota');


    }
}
