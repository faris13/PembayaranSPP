@extends('layouts.home')

@section('konten2')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Pembayaran SPP Siswa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="active">Selamat datang  {{Session::get('nama_petugas')}}</li>
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
          <h3 class="card-title mt-1">History Pembayaran SPP</h3>
           <a href="{{ url('petugas/tambah/pembayaran') }}" class="ml-2">
             <i class="icon fas fa-plus-circle"> Entry Pembayaran</i>
           </a>
        </div>
		<!--<h1>Halo {{Session::get('nama_petugas')}}</h1>
		<a href="{{url('logout')}}">logout</a>
		<br>
		
		
		<a href="{{url('petugas/tambah/pembayaran')}}">entri transaksi pembayaran</a>-->
		

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
				<th style="width: 20px">Aksi</th>
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
				<td>
					<a class="btn btn-success mb-1" style="width: 70px" href="{{url('petugas/edit/pembayaran/'.$row->id_pembayaran)}}">Edit</a>

					<form action="{{url('petugas/pembayaran'.$row->id_pembayaran)}}" method="post">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger" style="width: 70px" type="submit">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>

		</table>
		

		<br>
	</div>
</section>
@endsection