@extends('master.master')
@section('title')
    Data Kategori
@endsection
@section('isi')
<div class="row">
	<div class="col-md-9">
		<a href="{{ route('kategori.create') }}" class="btn btn-primary btn-rounded btn-sm"><i class="fa fa-plus"></i> Tambah Kategori</a>
	</div>
	<div class="col-md-3">
		<form action="{{route('kategori.search_kategori')}}" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="cari" class="form-control" placeholder="Masukan Kategori Barang">
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
        <h4 class="card-title">Data Kategori</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
				<tr>
					<th>Kategori Barang</th>
					<th class="text-center">Aksi</th>
				</tr>
            </thead>
            <tbody>
			@foreach($data as $b)
                <tr>
					<td>{{$b->kategori}}</td>
					<td style="text-align:center;">
						<div class="btn-group">
							<a type="submit" class="btn btn-primary text-white btn-sm" href="{{route('kategori.edit',$b->id)}}"> <i class="fas fa-pencil-alt"></i> </a>
						</div>
						<div class="btn-group">
							<form action="{{route('kategori.destroy',$b->id)}}" class="delete_form"  method="post">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-danger btn-sm" id="btn_delete"> <i class="fa fa-trash"></i></button>
							</form>
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