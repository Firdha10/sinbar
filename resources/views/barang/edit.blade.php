@extends('master.master')
@section('isi')
	<form action="{{route('barang.update',$data->id)}}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Barang</h4>
				<div class="form-group @error('nama') is-invalid @enderror">
					<label for="nama" class="col-md-4 control-label">Nama Barang</label>
					<div class="col-md-12">
						<input id="nama" type="text" class="form-control" name="nama" value="{{$data->nama_barang}}" required>
						<label class="invalid-feedback">Nama Harus Disi</label>
					</div>
				</div>
				<div class="form-group  @error('kategori') is-invalid @enderror">
					<label class="col-md-4 control-label">Kategori Barang</label>
					<div class="col-md-12">
						<select name="kategori" class="form-control" value="{{ $data->kategori_id }}">
							@foreach($kategori as $k)
								<option value="{{$k->id}}" {{$k->id == $k->kategori_id ?  'selected' : ''}}>{{$k->kategori}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group @error('stok') is-invalid @enderror">
					<label for="stok" class="col-md-4 control-label">Stok Barang</label>
					<div class="col-md-12">
						<input id="stok" type="text" class="form-control" name="stok" value="{{ $data->stok_barang }}" required>
						<label class="invalid-feedback">Stok Invalid</label>
					</div>
				</div>
				<div class="form-group @error('harga') is-invalid @enderror">
					<label for="harga" class="col-md-4 control-label">Harga Barang</label>
					<div class="col-md-12">
						<input id="harga" type="text" class="form-control" name="harga" value="{{$data->harga_barang}}" required>
						<label class="invalid-feedback">Harga Invalid</label>
					</div>
				</div>
				<div class="form-group @error('exp') is-invalid @enderror">
					<label for="exp" class="col-md-4 control-label">Expired Barang</label>
					<div class="col-md-12">
						<input id="exp" type="date" class="form-control" name="exp" value="{{$data->expired_barang}}" required>
						<label class="invalid-feedback">Expired Barang Harus Disi</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Foto</label><br>
					<div class="col-md-12">
						<img style="width: 100px" src="{{asset('image/'.$data->foto_barang)}}">
						<br> <br>
						<input type="file" name="foto" class="form-control">
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Simpan</button>
				<a href="{{route('barang.index')}}" class="btn btn-danger">Kembali</a>
			</div>
		</div>
	</form>
@endsection

