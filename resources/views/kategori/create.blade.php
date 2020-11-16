@extends('master.master')
@section('isi')
	<form action="{{route('kategori.store')}}" method="post">
		{{ csrf_field() }}
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Tambah Kategori</h4>
				<div class="form-group @error('kategori') is-invalid @enderror">
					<label for="kategori" class="col-md-4 control-label">Kategori Barang</label>
					<div class="col-md-12">
						<input id="kategori" type="text" class="form-control" name="kategori" value="{{old('kategori')}}" required>
						<label class="invalid-feedback">Kategori Harus Disi</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Simpan</button>
				<a href="{{route('kategori.index')}}" class="btn btn-danger">Kembali</a>
			</div>
		</div>
	</form>
@endsection