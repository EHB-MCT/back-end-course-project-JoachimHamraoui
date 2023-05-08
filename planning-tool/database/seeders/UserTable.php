<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User([
            'firstName' => 'Joachim',
            'lastName' => 'Hamraoui',
            'email' => 'joachimhamraoui@gmail.com',
            'password' => 'passwoord101',
            'role' => 'student'
        ]);
        $user->save();
        $user = new User([
            'firstName' => 'Bilal',
            'lastName' => 'Fawaz',
            'email' => 'bilalfawaz@gmail.com',
            'password' => 'passwoord101',
            'role' => 'student'
        ]);
        $user->save();
        $user = new User([
            'firstName' => 'Amina',
            'lastName' => 'Amzou',
            'email' => 'tangeramina@gmail.com',
            'password' => 'passwoord101',
            'role' => 'student'
        ]);
        $user->save();
    }
}
