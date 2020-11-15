@extends('master.master')
@section('isi')
<div class="row">
  <div class="col-md-9">
    <a href="{{ route('barang.create') }}" class="btn btn-primary btn-rounded btn-sm"><i class="fa fa-plus"></i> Tambah Barang</a>
  </div>
  <br><br>
  <div class="col-md-3">
	<form action="{{route('barang.cari_barang')}}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<input type="text" name="cari" class="form-control" placeholder="Masukan Nama Barang">
		</div>
	</form>
  </div>
</div>
@if(Session::has('success'))
	<div class="alert alert-success">
		<p>{{Session::get('success')}}</p>
	</div>
@endif
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Barang</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
				<tr>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Stok</th>
					<th>Exp</th>
					<th class="text-center">Aksi</th>
				</tr>
            </thead>
            <tbody>
			@foreach($barang as $b)
                <tr>
					<td>{{$b->nama_barang}}</td>
					<td>{{$b->Kategori->kategori}}</td>
					<td>{{$b->stok_barang}}</td>
					<td>{{$b->expired_barang}}</td>
					<td style="text-align:center;">
						<div class="btn-group">
							<a type="submit" class="btn btn-primary text-white btn-sm" href="{{route('barang.edit',$b->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
						</div>
						<div class="btn-group">
							<form action="{{route('barang.destroy',$b->id)}}" class="delete_form"  method="post">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-danger btn-sm" id="btn_delete"> <i class="fa fa-trash"></i></button>
							</form>
						</div>
						<div class="btn-group">
							<a href="{{route('barang.show',$b->id)}}" class="btn btn-success text-white btn-sm"><i class="fas fa fa-file"></i></a>
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
@endsection