@extends('layouts.home')

@section('konten2')
@section('title',$title)
<section class="content">
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Entri Pembayaran SPP</h3>
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
			<form action="{{url('petugas/pembayaran',@$pembayaran->id_pembayaran)}}" method="post" enctype="multipart/form-data">
				@csrf
				
				@if(!empty($pembayaran))
					@method('PATCH')
				@endif

				<div class="form-group">
				<label for="nisn">nisn</label>
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

				<label for="bulan_dibayar">bulan bayar</label>
				<select name="bulan_dibayar" id="bulan_dibayar" class="form-control">
					<option value="">pilih bulan bayar</option> inget ini harus di kurungin sisanya copas aja
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
				<label for="tahun_dibayar">tahun dibayar</label>
				<input type="text" id="tahun_dibayar" name="tahun_dibayar" value="{{old('tahun_dibayar',@$pembayaran->tahun_dibayar)}}" class="form-control">
			</div>
			<div class="form-group">
				<label for="id_spp">id_spp</label>
				<select name="id_spp" id="id_spp" class="form-control">
					<option value="">pilih id_spp</option>
					@foreach($spp as $rows)
						<option value="{{$rows->id_spp}}"

							
							{{old('id_spp')}}
							
							@if(@$pembayaran->id_spp == $rows->id_spp)
								selected
							@endif

							>{{$rows->tahun}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="jumlah_bayar">jumlah bayar</label>
				<input type="text" id="jumlah_bayar" name="jumlah_bayar" value="{{old('jumlah_bayar',@$pembayaran->jumlah_bayar)}}" class="form-control">
			</div>

				<a href="{{ url('petugas/home')}}" class="btn btn-danger">Batal</a>
				<button type="submit" class="btn btn-primary">Kirim</button>		
		

			</form>


	</div>

</section>
@endsection