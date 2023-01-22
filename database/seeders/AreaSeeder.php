<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area1 = Area::firstOrCreate([
            'nombre' => 'Direccion'
        ]);
        $area2 = Area::firstOrCreate([
            'nombre' => 'Secretariado'
        ]);        
    }
}
