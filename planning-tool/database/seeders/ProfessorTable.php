<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teacher = new Professor([
            'firstName' => 'Mike',
            'lastName' => 'Derycke',
            'email' => 'mikederycke@gmail.com',
            'password' => 'passwoord101',
        ]);
        $teacher->save();
        $teacher = new Professor([
            'firstName' => 'Joni',
            'lastName' => 'de Borger',
            'email' => 'jonideborger@gmail.com',
            'password' => 'passwoord101',
        ]);
        $teacher->save();
        $teacher = new Professor([
            'firstName' => 'Bert',
            'lastName' => 'Heyman',
            'email' => 'bertheyman@gmail.com',
            'password' => 'passwoord101',
        ]);
        $teacher->save();
    }
}
