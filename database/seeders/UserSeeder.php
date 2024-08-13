<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $users = ['durand', 'dupont', 'martin'];

        foreach ($users as $user) {
            User::create([
                'name' => ucfirst($user),
                'email' => $user . '@chezlui.fr',
                'admin' => $user === 'durand',
                'password' => bcrypt('password')
            ]);
        }
    }
}
