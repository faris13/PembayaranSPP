@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Lupa Password Petugas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/crud/petugas')}}">Petugas</a></li>
          <li class="breadcrumb-item active">Lupa Password</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Masukkan Password Baru</h3>
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
		<form action="{{url('admin/forgot',@$petugas->id_petugas)}}" method="post">
			@csrf

			<div class="form-group">
				<label for="password">Password Baru</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label for="cpassword">Konfirmasi Password</label>
				<input type="password" id="cpassword" name="cpassword" class="form-control">
			</div>
			<div>
				<a href="{{url('admin/crud/petugas')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-primary">Kirim</button>
			</div>
		</form>
	</div>



	</div>


</section>
@endsection