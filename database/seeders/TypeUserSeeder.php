<?php

namespace Database\Seeders;

use App\Models\TypesUsers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TypesUsers::create([
            'type_user'=>'Administrador'
        ]);

        TypesUsers::create([
            'type_user'=>'Cliente'
        ]);

        TypesUsers::create([
            'type_user'=>'Asesor'
        ]);

    }
}
