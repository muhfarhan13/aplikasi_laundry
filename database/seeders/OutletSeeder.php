<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Outlet::create(['nama'=>'outlet1','alamat'=>'jalan raya tapos','telepon'=>'080182018']);
    }
}
