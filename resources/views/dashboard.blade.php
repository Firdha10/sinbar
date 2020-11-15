@extends('master.master')
@section('isi')
	<h1>Welcome {{auth()->user()->name}} </h1>
	<hr>
	<br>
	<div class="row">
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>BARANG</b></p>
				<p>Jumlah Produk : {{count($barang)}} Barang</p>
			</div>
		</div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>SUPLIER</b></p>
				<p>Jumlah Suplier : {{count($suplier)}} Suplier</p>
			</div>
		</div>
		<div class="w-100"></div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>BARANG MASUK</b></p>
				<p>Jumlah Barang Masuk : {{count($masuk)}} Barang Masuk</p>
			</div>
		</div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>BARANG KELUAR</b></p>
				<p>Jumlah Barang Keluar : {{count($keluar)}} Barang Keluar</p>
			</div>
		</div>
	</div>
@endsection