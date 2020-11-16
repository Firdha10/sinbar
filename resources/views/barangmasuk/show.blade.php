@extends('master.master')
@section('isi')
<h3> <b>DETAIL BARANG MASUK</b> </h3>
	<br>
	<b>Nama Supplier</b>
	<p>{{$data->Suplier->nama_suplier}}</p>
	<b>Alamat Supplier</b>
	<p>{{$data->Suplier->alamat_suplier}}</p>
	<b>No HP Supplier</b>
	<p>{{$data->Suplier->no_hp_suplier}}</p>
	<b>Nama Barang</b>
	<p>{{$data->Barang->nama_barang}}</p>
	<b>Stok Barang</b>
	<p>{{$data->Barang->stok_barang}}</p>
	<b>EXP Barang</b>
	<p>{{$data->Barang->expired_barang}}</p>
	<b>Tanggal Masuk Barang</b>
	<p>{{$data->tgl_masuk}}</p>
	<b>Jumlah Barang Masuk</b>
	<p>{{$data->jumlah_masuk}}</p>
@endsection