@extends('layouts.home')

@section('konten2')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Selamat Datang {{Session::get('nama')}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="active">{{Session::get('nama')}}</li>
          <li class="ml-3 mr-2"><a href="{{url('logout')}}">logout</a></li>
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
          <h3 class="card-title mt-1">Data Pembayaran SPP Saya</h3>
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
    <table class="table table-bordered table-hover table-fixed" id="example2">
      <thead>

			<tr>
				<th style="width: 20px">No</th>
				<th style="width: 20px">ID</th>
				<th>Tanggal</th>
				<th>Petugas</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>bulan dibayar</th>
				<th>tahun dibayar</th>
				<th>Jumlah Bayar</th>
				<th>Tahun</th>
			</tr>
		</thead>
			
		<tbody>
			@foreach($pembayaran as $row)
			<tr>
				<td>{{isset($i)? ++$i : $i = 1 }}</td>
				<td>{{$row->id_pembayaran}}</td>
				<td>{{$row->tgl_bayar}}</td>
				<td>{{$row->petugas->nama_petugas}}</td>
				<td>{{$row->siswa->nama}}</td>
				<td>{{$row->siswa->kelas->nama_kelas}}</td>
				<td>{{$row->bulan_dibayar}}</td>
				<td>{{$row->tahun_dibayar}}</td>
				<td>{{$row->jumlah_bayar}}</td>
				<td>{{$row->spp->tahun}}</td>
			</tr>
			@endforeach
		</tbody>


		</table>
		

		<br>
	</div>
</section>
@endsection