@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Data Pembayaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Pembayaran</li>
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
          <h3 class="card-title mt-1">Data Pembayaran</h3>
           <a href="{{ url('admin/tambah/pembayaran') }}" style="margin-left: 10px">
             <i class="icon fas fa-plus-circle"></i>
           </a>
           <a href="{{url('admin/export/pembayaran')}}" style="margin-left: 10px;color: green">
           	<i class="icon fas fa-upload"></i>
           </a>
        </div>
		<!--<h1>CRUD PEMBAYARAN</h1>

		<br>
		<a href="{{url('admin/home')}}">home</a>
		<a href="{{url('admin/tambah/pembayaran')}}">tambah</a> -->

		
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
				<th style="width: 20px">ID</th>
				<th>Tanggal</th>
				<th>Petugas</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>bulan dibayar</th>
				<th>tahun dibayar</th>
				<th>Jumlah Bayar</th>
				<th>Tahun</th>
				<th style="width: 20px">aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pembayaran as $row)
			<tr>
				<td>{{$row->id_pembayaran}}</td>
				<td>{{$row->tgl_bayar}}</td>
				<td>{{$row->petugas->nama_petugas}}</td>
				<td>{{$row->siswa->nama}}</td>
				<td>{{$row->siswa->kelas->nama_kelas}}</td>
				<td>{{$row->bulan_dibayar}}</td>
				<td>{{$row->tahun_dibayar}}</td>
				<td>{{$row->jumlah_bayar}}</td>
				<td>{{$row->spp->tahun}}</td>
				<td>
					<a class="btn btn-success mb-1" style="width: 70px" href="{{url('admin/edit/pembayaran/'.$row->id_pembayaran)}}">Edit</a>
					<form action="{{url('admin/delete/pembayaran'.$row->id_pembayaran)}}" method="post">
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
