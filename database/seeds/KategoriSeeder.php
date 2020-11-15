<?php

use Illuminate\Database\Seeder;
use App\KategoriModel;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriModel::create([
        	'kategori' => 'deterjen'
        ]);
    }
}
