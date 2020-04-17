@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data Kelas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/crud/kelas')}}">Kelas</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Masukkan Data Kelas</h3>
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

		<form action="{{url('admin/kelas',@$kelas->id_kelas)}}" method="post" enctype="multipart/form-data">
			@if(!empty($kelas))
				@method('PATCH')
			@endif
				
			@csrf

			<div class="form-group">
				<b>Nama Kelas</b><b style="color: #808080"> (XII RPL 1)</b>
			<!--	<label for="nama_kelas">nama kelas</label> -->
				<input class="form-control" type="text" id="nama_kelas" name="nama_kelas" value="{{old('nama_kelas',@$kelas->nama_kelas)}}">
			</div>
			<div class="form-group">
				<b>Kompetensi Keahlian</b><b style="color: #808080"> (Rekayasa Perangkat Lunak)</b>
				<input class="form-control" type="text" id="kompetensi_keahlian" name="kompetensi_keahlian" value="{{old('kompetensi_keahlian',@$kelas->kompetensi_keahlian)}}">
			</div>
				<a href="{{url('admin/crud/kelas')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-primary">Kirim</button>
		</form>

	</div>

	</div>


</section>
@endsection