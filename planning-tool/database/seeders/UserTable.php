<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'chosenCourse1' => 0,
            'chosenCourse2' => 1,
            'chosenCourse3' => 2
        ]);
        $user->save();
    }
}
