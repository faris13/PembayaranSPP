@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <!-- container-fluid -->
  <div class="container-fluid">
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
    <!-- START STAT BOX -->
    <div class="row">
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
          <div class="inner">
            <h3>{{$count_siswa}}</h3>
            <p>Siswa</p>
          </div>
          <div class="icon">
          	<i class="fas fa-graduation-cap"></i>
          </div>
          <a href="{{url('admin/crud/siswa')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
          <div class="inner">
          	<h3>{{$count_petugas}}</h3>
            <p>Petugas</p>
          </div>
          <div class="icon">
          	<i class="fas fa-user-circle"></i>
          </div>
          <a href="{{url('admin/crud/petugas')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
          <div class="inner">
          	<h3>{{$count_kelas}}</h3>
            <p>Kelas</p>
          </div>
          <div class="icon">
          	<i class="fas fa-table"></i>
          </div>
          <a href="{{url('admin/crud/kelas')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
          <div class="inner">
          	<h3>{{$count_spp}}</h3>
            <p>SPP</p>
          </div>
          <div class="icon">
          	<i class="fas fa-tasks"></i>
          </div>
          <a href="{{url('admin/crud/spp')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    	<div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-white">
          <div class="inner">
          	<h3>{{$count_pembayaran}}</h3>
            <p>Pembayaran</p>
          </div>
          <div class="icon">
          	<i class="fas fa-credit-card"></i>
          </div>
          <a href="{{url('admin/crud/pembayaran')}}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
		</div>
	</div>

	</div>
</section>
@endsection