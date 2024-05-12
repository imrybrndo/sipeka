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
        $data = User::create([
            'name' => 'Kota Manado',
            'email' => 'pemkotmanado@gmail.com',
            'username' => 'pemkotmdo',
            'password' => bcrypt(12345678)
        ]);
        $data->assignRole('admin');
    }
}
