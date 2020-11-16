@extends('master.master')
@section('isi')
	<form action="{{route('barangkeluar.store')}}" method="post">
		{{ csrf_field() }}
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Tambah Barang Keluar</h4>
				<div class="form-group">
					<label class="col-md-4 control-label">Nama Barang</label>
					<div class="col-md-12">
						<select name="barang" class="form-control">
							@foreach($barang as $b)
								<option value="{{$b->id}}">{{$b->nama_barang}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Jumlah Barang Keluar</label>
					<div class="col-md-12">
						<input type="number" name="jumlah" class="form-control" required="">
					</div>
				</div>
				<button type="submit" class="btn btn-primary" id="submit">Simpan</button>
				<a href="{{route('barangkeluar.index')}}" class="btn btn-danger">Kembali</a>
			</div>
		</div>
	</form>
@endsection