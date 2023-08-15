<?php

namespace Database\Seeders;

use App\Models\PenyewaanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenyewaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_penyewaan_mobil')->insert([
            'tanggal_disewa' => Carbon::now(),
            'tanggal_pengembalian' => Carbon::now()
        ]);
    }
}
