<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MobilModel;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'model_mobil' => 'Sport',
                'plat_mobil' => 'B 214 A',
                'tarif' => '900000'
            ],
            [
                'model_mobil' => 'Classic',
                'plat_mobil' => 'B 411461 A',
                'tarif' => '1000000'
            ]
            

        ];

        MobilModel::insert($data);
    }
}
