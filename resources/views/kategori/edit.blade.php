@extends('master.master')
@section('isi')
	<form action="{{route('kategori.update',$data->id)}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Kategori</h4>
				<div class="form-group @error('kategori') is-invalid @enderror">
					<label for="kategori" class="col-md-4 control-label">Kategori Barang</label>
					<div class="col-md-12">
						<input id="kategori" type="text" class="form-control" name="kategori" value="{{$data->kategori}}" required>
						<label class="invalid-feedback">Kategori Harus Disi</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Simpan</button>
				<a href="{{route('kategori.index')}}" class="btn btn-danger">Kembali</a>
			</div>
		</div>
	</form>
@endsection