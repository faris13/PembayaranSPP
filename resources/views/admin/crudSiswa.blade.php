@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Data Siswa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Siswa</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title mt-1">Data Siswa</h3>
           <a href="{{ url('admin/tambah/siswa') }}" class="ml-2">
             <i class="icon fas fa-user-plus"></i>
           </a>
        </div>
		<!--<h1>CRUD SISWA</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/siswa')}}">tambah</a>-->
		<div class="card-body">
			@if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
          @endif

          @if(session('error'))
          <div class="alert alert-error">
            {{ session('error') }}
          </div>
          @endif
		<table class="table table-bordered table-hover table-fixed" id="example2">
		  <thead>
			<tr>
				<th style="width: 20px">No</th>
				<th>NISN</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Nama Kelas</th>
				<th>Alamat</th>
				<th>No Telp</th>
				<th style="width: 20px">Tahun</th>
				<th style="width: 20px">aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($siswa as $row)
			<tr>
				<td>{{ isset($i) ? ++$i : $i = 1 }}</td>
				<td>{{$row->nisn}}</td>
				<td>{{$row->nis}}</td>
				<td>{{$row->nama}}</td>
				<td>{{$row->kelas->nama_kelas}}</td>
				<td>{{$row->alamat}}</td>
				<td>{{$row->no_telp}}</td>
				<td>{{$row->spp->tahun}}</td>
				<td>					
					<a class="btn btn-success mb-1" style="width: 70px" href="{{url('admin/edit/siswa/'.$row->nisn)}}">edit</a>
					<form action="{{url('admin/delete/siswa'.$row->nisn)}}" method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" style="width: 70px">delete</button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</section>
@endsection