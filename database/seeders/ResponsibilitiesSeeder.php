<?php

namespace Database\Seeders;

use App\Models\Responsibility;
use Illuminate\Database\Seeder;

class ResponsibilitiesSeeder extends Seeder
{
    
    public function run()
    {
        $data = [
            'responsibility' => 'Administrador'
        ];

        Responsibility::create($data);

        $data = [
            'responsibility' => 'Editor'
        ];

        Responsibility::create($data);

        $data = [
            'responsibility' => 'Leitor'
        ];

        Responsibility::create($data);
    }
}
