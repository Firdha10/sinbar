@extends('master.master')
@section('isi')
<div class="row">
	<div class="col-md-9">
		<a href="{{ route('barangkeluar.create') }}" class="btn btn-primary btn-rounded btn-sm"><i class="fa fa-plus"></i> Tambah Barang Keluar</a>
	</div>
	<div class="col-md-3">
		<form action="{{route('barangkeluar.cari_masuk')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="cari" class="form-control" placeholder="Masukan Nama Suplier">
			</div>
		</form>
	</div>
</div>
@if(Session::has('success'))
	<div class="alert alert-success">
		<p>{{Session::get('success')}}</p>
	</div>
@endif
<hr>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Barang Keluar</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
				<tr>
					<th>Nama Barang</th>
					<th>Nama Supplier</th>
					<th>Tanggal Masuk</th>
					<th>Jumlah</th>
					<th class="text-center">Aksi</th>
				</tr>
            </thead>
            <tbody>
			@foreach($data as $d)
                <tr>
					<td>{{$d->Barang->nama_barang}}</td>
					<td>{{$d->Suplier->nama_suplier}}</td>
					<td>{{$d->tgl_masuk}}</td>
					<td>{{$d->jumlah_masuk}}</td>
					<td style="text-align:center;">
						<div class="btn-group">
							<form action="{{route('barangmasuk.destroy',$d->id)}}" class="delete_form"  method="post">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-danger btn-sm" id="btn_delete"> <i class="fa fa-trash"></i></button>
							</form>
						</div>
						<div class="btn-group">
							<a href="{{route('barang.show',$d->id)}}" class="btn btn-success text-white btn-sm"><i class="fas fa fa-file"></i></a>
						</div>
					</td>
                </tr>
			@endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<h1>DATA BARANG KELUAR</h1>
<div class="row">
	<div class="col-md-8">
		<a href="{{route('user.tambahkeluar')}}" class="btn btn-info">TAMBAH</a>
	</div>
	<div class="col-md-4">
		<form action="{{route('user.cari_keluar')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="cari" class="form-control" placeholder="masukan tanggal barang keluar">
			</div>
		</form>
	</div>
</div>
@if(Session::has('success'))
	<div class="alert alert-info">
		<p>{{Session::get('success')}}</p>
	</div>
@endif
<table class="table table-hover">
	<tr>
		<th>NAMA PEMBELI</th>
		<th>NAMA BARANG</th>
		<th>TGL PEMBELIAN</th>
		<th>JUMLAH</th>
		<th>AKSI</th>
	</tr>
	@foreach($data as $d)
	<tr>
		<td>{{$d->Pelanggan->nama_pelanggan}}</td>
		<td>{{$d->barang->nama_barang}}</td>
		<td>{{$d->tgl_keluar}}</td>
		<td>{{$d->jumlah_keluar}}</td>
		<td>
			<a href="{{route('user.show_keluar',$d->id)}}" class="btn btn-info">DETAIL</a>
			<a href="{{route('user.delete_keluar',$d->id)}}" onclick="return confirm('Hapus Data?')" class="btn btn-danger">HAPUS</a>
		</td>
	</tr>
	@endforeach
</table>
@endsection