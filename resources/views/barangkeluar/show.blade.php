@extends('master.master')
@section('isi')
<h3> <b>DETAIL BARANG Keluat</b> </h3>
	<br>
	<b>Nama Barang</b>
	<p>{{$data->Barang->nama_barang}}</p>
	<b>Stok Barang</b>
	<p>{{$data->Barang->stok_barang}}</p>
	<b>EXP Barang</b>
	<p>{{$data->Barang->expired_barang}}</p>
	<b>Tanggal Masuk Keluar</b>
	<p>{{$data->tgl_keluar}}</p>
	<b>Jumlah Barang Keluar</b>
	<p>{{$data->jumlah_keluar}}</p>
@endsection