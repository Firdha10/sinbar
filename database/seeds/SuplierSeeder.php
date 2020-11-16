<?php

use Illuminate\Database\Seeder;
use App\SuplierModel;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuplierModel::create([
        	'nama_suplier' => 'CV Media Jaya',
        	'alamat_suplier' => 'Jl. Kh. Wahid Hasyim No. 88',
        	'no_hp_suplier' => '08916289076',
        	'email_suplier' => 'mediajaya@gmail.com',
        	'pj_suplier' => 'budi',
        	'tanggal_suplier' => date('Y-m-d')
        ]);
    }
}
