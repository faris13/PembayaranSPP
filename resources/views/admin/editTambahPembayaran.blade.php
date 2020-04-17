@extends('layout.home')

@section('konten')
@section('title',$title)
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Input Data Pembayaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{url('admin/crud/pembayaran')}}">Pembayaran</a></li>
          <li class="breadcrumb-item active">Input</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Masukkan Pembayaran SPP</h3>
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
		<form action="{{url('admin/pembayaran',@$pembayaran->id_pembayaran)}}" method="post" enctype="multipart/form-data">
			@if(!empty($pembayaran))
				@method('PATCH')
			@endif
				
			@csrf

			<div class="form-group">
				<b>NISN</b>
				<select name="nisn" id="nisn" class="form-control">
					<option value="">pilih nisn</option>
					@foreach($siswa as $rown)
						<option value="{{$rown->nisn}}" 
							{{old('nisn')}}

							@if(@$pembayaran->nisn == $rown->nisn)
								selected
							@endif	 
							>{{$rown->nisn}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<b>Bulan Bayar</b>
				<select name="bulan_dibayar" id="bulan_dibayar" class="form-control">
					<option value="">pilih bulan bayar</option>
						<option value="januari" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'januari')? 'selected' : '')}}>Januari</option>
						<option value="febuari" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'febuari')? 'selected' : '')}}>febuari</option>
						<option value="maret" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'maret')? 'selected' : '')}}>maret</option>
						<option value="april" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'april')? 'selected' : '')}}>april</option>
						<option value="mei" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'mei')? 'selected' : '')}}>mei</option>
						<option value="juni" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'juni')? 'selected' : '')}}>juni</option>
						<option value="juli" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'juli')? 'selected' : '')}}>juli</option>
						<option value="agustus" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'agustus')? 'selected' : '')}}>agustus</option>
						<option value="september" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'september')? 'selected' : '')}}>september</option>
						<option value="oktober" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'oktober')? 'selected' : '')}}>oktober</option>
						<option value="november" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'november')? 'selected' : '')}}>november</option>
						<option value="desember" {{old('bulan_dibayar',(@$pembayaran->bulan_dibayar == 'desember')? 'selected' : '')}}>desember</option>
				</select>
			</div>
			<div class="form-group">
				<b>Tahun Dibayar</b>
				<input type="text" id="tahun_dibayar" name="tahun_dibayar" value="{{old('tahun_dibayar',@$pembayaran->tahun_dibayar)}}" class="form-control">
			</div>
			<div class="form-group">
				<b>ID SPP</b>
				<select name="id_spp" id="id_spp" class="form-control">
					<option value="">pilih id_spp</option>
					@foreach($spp as $rows)
						<option value="{{$rows->id_spp}}"
							
							@if(@$pembayaran->id_spp == $rows->id_spp)
								selected
							@endif	 

							>{{$rows->tahun}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="jumlah_bayar">Jumlah bayar</label>
				<input type="text" id="jumlah_bayar" name="jumlah_bayar" value="{{old('jumlah_bayar',@$pembayaran->jumlah_bayar)}}" class="form-control">
			</div>
			<div>
				<a href="{{url('admin/crud/pembayaran')}}" class="btn btn-danger">Kembali</a>
				<button type="submit" class="btn btn-primary">Kirim</button>
			</div>
		</form>
		</div>
	</div>


</section>
@endsection