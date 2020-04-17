@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data Petugas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/crud/petugas')}}">Petugas</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Masukkan Data Petugas</h3>
		</div>
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
		<form action="{{url('admin/petugas',@$petugas->id_petugas)}}" method="post" enctype="multipart/form-data">
			@if(!empty($petugas))
				@method('PATCH')
			@endif
				
			@csrf
			
			<div class="form-group">
				<label for="nama_petugas">Nama Petugas</label>
				<input type="text" id="nama_petugas" name="nama_petugas" value="{{old('nama_petugas',@$petugas->nama_petugas)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" value="{{old('username',@$petugas->username)}}" class="form-control">
			</div>
			<div 
				@if(!empty($petugas))
					hidden
				@endif
			 class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" value="{{old('password',@$petugas->password)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="level">Level</label>
				<select name="level" id="level" class="form-control">
					<option value="">pilih level</option>
					<option value="admin" {{old('level',(@$petugas->level == 'admin') ? 'selected' : '')}}>admin</option>
					<option value="petugas" {{old('level',(@$petugas->level == 'petugas') ? 'selected' : '')}}>petugas</option>
				</select>
			</div>
			<div class="form-group">
				<a href="{{url('admin/crud/petugas')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-primary">Kirim</button>
			</div>
		</form>


</div>
	</div>


</section>
@endsection