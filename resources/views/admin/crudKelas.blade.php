@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Data Kelas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Kelas</li>
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
          <h3 class="card-title mt-1">Data Kelas</h3>
           <a href="{{ url('admin/tambah/kelas') }}" class="ml-2">
             <i class="icon fas fa-plus-circle"></i>
           </a>
        </div>
		<!--<h1>CRUD KELAS</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/kelas')}}">tambah</a> -->
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
				<th  style="width: 20px">ID</th>
				<th>Nama Kelas</th>
				<th>Kompetensi Keahlian</th>
				<th style="width: 20px">aksi</th>
			</tr>
			</thead>
			<tbody>
			@foreach($kelas as $row)
			<tr>
				<td>{{$row->id_kelas}}</td>
				<td>{{$row->nama_kelas}}</td>
				<td>{{$row->kompetensi_keahlian}}</td>
				<td>					
					<a class="btn btn-success mb-1" style="width: 70px" href="{{url('admin/edit/kelas/'.$row->id_kelas)}}">Edit</a>
					<form action="{{url('admin/delete/kelas'.$row->id_kelas)}}" method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" style="width: 70px">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>

</section>
@endsection