@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data SPP</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/crud/spp')}}">SPP</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Masukkan Data SPP</h3>
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
		<form action="{{url('admin/spp',@$spp->id_spp)}}" method="post">
			@if(!empty($spp))
				@method('PATCH')
			@endif
				
			@csrf

			<div class="form-group">
				<label for="tahun">Tahun</label>
				<input type="text" id="tahun" name="tahun" value="{{old('tahun',@$spp->tahun)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="nominal">Nominal</label>
				<input type="text" id="nominal" name="nominal" value="{{old('nominal',@$spp->nominal)}}" class="form-control">
			</div>
			<div>
				<a href="{{url('admin/crud/spp')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-primary">Kirim</button>
			</div>
		</form>



	</div>


</section>
@endsection