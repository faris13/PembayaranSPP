@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data Siswa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/crud/siswa')}}">Siswa</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Masukkan Data Siswa</h3>
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
		<form action="{{url('admin/siswa',@$siswa->nisn)}}" method="post">
			@if(!empty($siswa))
				@method('PATCH')
			@endif
				
			@csrf

			<div class="form-group">
				<b>NISN</b>
				<input type="text" id="nisn" name="nisn" value="{{old('nisn',@$siswa->nisn)}}" class="form-control">
			</div>
			<div class="form-group">
				<b>NIS</b>
				<input type="text" id="nis" name="nis" value="{{old('nis',@$siswa->nis)}}" class="form-control">
			</div>
			<div class="form-group">
				<b>Nama</b>
				<input type="text" id="nama" name="nama" value="{{old('nama',@$siswa->nama)}}" class="form-control">
			</div>
			<div class="form-group">
				<b>Kelas</b>
				<select name="id_kelas" id="id_kelas" class="form-control">
					<option value="">pilih kelas</option>
					@foreach($kelas as $rowk)
					<option value="{{$rowk->id_kelas}}"
				
						{{old('id_kelas')}}

						@if(@$siswa->id_kelas == $rowk->id_kelas)
							selected
						@endif

						>{{$rowk->nama_kelas}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<b>Alamat</b>
				<input type="text" id="alamat" name="alamat" value="{{old('alamat',@$siswa->alamat)}}" class="form-control">
			</div>
			<div class="form-group">
				<b>No Telepon</b>
				<input type="text" id="no_telp" name="no_telp" value="{{old('no_telp',@$siswa->no_telp)}}" class="form-control">
			</div>
			<div class="form-group">
				<b>Tahun SPP</b>
				<select name="id_spp" id="id_spp" class="form-control">
					<option value="">pilih SPP</option>
					@foreach($spp as $rows)
					<option value="{{$rows->id_spp}}"
				
						{{old('id_spp')}}

						@if(@$siswa->id_spp == $rows->id_spp)
							selected
						@endif

						>{{$rows->tahun}}</option>
					@endforeach
				</select>
			</div>
			<div>
				<a href="{{url('admin/crud/siswa')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-primary">Kirim</button>
			</div>
		</form>


</div>
	</div>


</section>
@endsection