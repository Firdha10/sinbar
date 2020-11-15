@extends('master.master')
@section('isi')
	<form action="{{route('supplier.store')}}" method="post">
		{{ csrf_field() }}
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Tambah Supplier</h4>
				<div class="form-group @error('nama') is-invalid @enderror">
					<label for="nama" class="col-md-4 control-label">Nama Supplier</label>
					<div class="col-md-12">
						<input id="nama" type="text" class="form-control" name="nama" value="{{old('nama')}}" required>
						<label class="invalid-feedback">Nama Harus Disi</label>
					</div>
				</div>
				<div class="form-group @error('alamat') is-invalid @enderror">
					<label for="alamat" class="col-md-4 control-label">Alamat Supplier</label>
					<div class="col-md-12">
						<input id="alamat" type="text" class="form-control" name="alamat" value="{{old('alamat')}}" required>
						<label class="invalid-feedback">Alamat Harus Disi</label>
					</div>
				</div>
				<div class="form-group @error('hp') is-invalid @enderror">
					<label for="harga" class="col-md-4 control-label">Nomor Telepon Supplier</label>
					<div class="col-md-12">
						<input id="hp" type="text" class="form-control" name="hp" value="{{old('hp')}}" required>
						<label class="invalid-feedback">No HP Harus Diisi</label>
					</div>
				</div>
				<div class="form-group @error('email') is-invalid @enderror">
					<label for="email" class="col-md-4 control-label">Email Supplier</label>
					<div class="col-md-12">
						<input id="email" type="text" class="form-control" name="email" value="{{old('email')}}" required>
						<label class="invalid-feedback">Email Supplier Harus Disi</label>
					</div>
				</div>
				<div class="form-group @error('pj') is-invalid @enderror">
					<label for="pj" class="col-md-4 control-label">Penanggung Jawab Supplier</label>
					<div class="col-md-12">
						<input id="pj" type="text" class="form-control" name="pj" value="{{old('pj')}}" required>
						<label class="invalid-feedback">PJ Harus Disi</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Simpan</button>
				<a href="{{route('supplier.index')}}" class="btn btn-danger">Kembali</a>
			</div>
		</div>
	</form>
@endsection