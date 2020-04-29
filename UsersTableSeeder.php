<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'Durand',
            'adresse' => 'Chatelet Paris',
            'email' => 'durand@chezlui.fr',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),

        ]);

        User::create([
            'name' => 'Dupont',
            'adresse' => 'Champs Elysées',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);

        User::create([
            'name' => 'Martin',
            'adresse' => 'Ingetis Paris',
            'email' => 'martin@chezlui.fr',
            'role' => 'vendeur',
            'password' => bcrypt('vendeur'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
