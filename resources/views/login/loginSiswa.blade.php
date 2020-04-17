@extends('login.tampilanLogin.home')

@section('content')
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
<link rel="stylesheet" type="text/css" href="{{ asset('test.css') }}">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Selamat Datang di Website <b>Pembayaran SPP</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Masukkan NISN kamu</p>
		<form action="{{url('login/siswa')}}" method="post">
			@csrf
			<div class="input-group mb-3">
				<input type="text" id="nisn" name="nisn" class="form-control" placeholder="NISN">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>
			<div class="social-auth-links text-center mb3"></div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
			<a href="{{url('login/petugas')}}" class="btn btn-danger btn-block">Petugas</a>
		</form>
	</div>
</section>
@endsection