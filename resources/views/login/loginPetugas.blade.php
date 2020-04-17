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
    <a href="#"><b>Admin</b> Pembayaran SPP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk jika anda Admin atau Petugas</p>
		<form action="{{url('login/petugas')}}" method="post">
			@csrf
			<div class="input-group mb-3">
				<input type="text" id="username" name="username" class="form-control" placeholder="Username">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-user"></span>
					</div>
				</div>
			</div>
			<div class="input-group mb-3">
				<input type="password" id="password" name="password" class="form-control" placeholder="Password">
				<div class="input-group-append">
					<div class="input-group-text">
						<span class="fas fa-lock"></span>
					</div>
				</div>
			</div>
			<div class="social-auth-links text-center mb-3">
				<button type="submit" class="btn btn-primary btn-block">Login</button>
				<a href="{{url('login')}}" class="btn btn-danger btn-block">Siswa</a>
			</div>
		</form>
	</div>
</section>
@endsection