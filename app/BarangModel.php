<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    protected $table = 'Barang';

     protected $fillable = [
        'nama_barang', 'kategori_id', 'stok_barang','harga_barang','tgl_masuk_barang','expired_barang','foto_barang'
    ];

    public function Kategori()
	{
		return $this->belongsTo('App\KategoriModel');
	}
}
