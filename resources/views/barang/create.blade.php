@extends('master.master')
@section('isi')
<h1>TAMBAH BARANG</h1>
<br>
<hr>
<form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
		<label>Nama Barang</label>
		<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
		<label class="invalid-feedback">Nama Harus Disi</label>
	</div>
	<div class="form-group">
		<label>Kategori Barang</label>
		<select name="kategori" class="form-control">
			<option value=''>--- Pilih Kategori ---</option>
			@foreach($kategori as $k)
				<option value="{{$k->id}}">{{$k->kategori}}</option>
			@endforeach
		</select>
		<label class="invalid-feedback">Kategori Harus Disi</label>
	</div>
	<div class="form-group">
		<label>Stok Barang</label>
		<input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror">
		<label class="invalid-feedback">Stok Invalid</label>
	</div>
	<div class="form-group">
		<label>Harga Barang</label>
		<input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror">
		<label class="invalid-feedback">Harga Invalid</label>
	</div>
	<div class="form-group">
		<label>Expired Barang</label>
		<input type="date" name="exp" class="form-control @error('exp') is-invalid @enderror">
		<label class="invalid-feedback">exp Harus Disi</label>
	</div>
	<div class="form-group">
		<label>Foto Barang</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<input type="submit" name="simpan" value="SIMPAN" class="btn btn-info">
</form>	
@endsection