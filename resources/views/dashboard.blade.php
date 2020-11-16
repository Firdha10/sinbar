@extends('master.master')
@section('isi')
	<h1>Welcome {{auth()->user()->name}} </h1>
	<hr>
	<br>
	<div class="row">
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>Barang</b></p>
				<p>Jumlah Barang : {{count($barang)}} Barang</p>
			</div>
		</div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>Supplier</b></p>
				<p>Jumlah Supplier : {{count($suplier)}} Suplier</p>
			</div>
		</div>
		<div class="w-100"></div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>Kategori Barang</b></p>
				<p>Jumlah Kategori Barang : {{count($kategori)}} Barang</p>
			</div>
		</div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>Barang Masuk</b></p>
				<p>Jumlah Barang Masuk : {{count($masuk)}} Barang Masuk</p>
			</div>
		</div>
		<div class="w-100"></div>
		<div class="col">
			<div class="alert alert-info">
				<p class="text-center"><b>Barang Keluar</b></p>
				<p>Jumlah Barang Keluar : {{count($keluar)}} Barang Keluar</p>
			</div>
		</div>
		<div class="col"></div>
	</div>
@endsection