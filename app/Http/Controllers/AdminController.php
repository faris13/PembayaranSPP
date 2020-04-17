<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{


    public function viewHomeAdmin()
    {
        
        if (!Session::get('login')) {
        
            return redirect('/login');
        }else{
         
            if (Session::get('level') == 'admin') {
                
                $data['title'] = 'Pembayaran SPP | Admin';
                $data['count_kelas'] = \App\Kelas::count();
                $data['count_pembayaran'] = \App\Pembayaran::count();
                $data['count_petugas'] = \App\Petugas::count();
                $data['count_siswa'] = \App\Siswa::count();
                $data['count_spp'] = \App\Spp::count();
    	       return view('admin.home',$data)->with('success','Selamat Datang Admin');

            
            } else if(Session::get('level') == 'petugas') {
                
                $data['title'] = 'Pembayaran SPP | Petugas';
                return redirect('petugas/home',$data)->with('success','Selamat Datang Petugas');
            
            } else{
                return redirect('/login')->with('error','Anda tidak memiliki Hak Akses');
            }
        }

    }


    


    public function viewCrudPetugas()
    {
    	$petugas = 'petugas';
    	$data['petugas'] = \App\Petugas::where('level',$petugas)->get();
        $data['title'] = 'Manage Data Petugas | Admin';
    	return view('admin.crudpetugas',$data);
    }

    public function viewTambahPetugas()
    {
        $data['title'] = 'Tambah Data Petugas | Admin';
    	return view('admin.editTambahPetugas',$data);
    }

   
    public function tambahPetugasPost(Request $request)
    {
        
    	$this->validate($request,[
            'nama_petugas' => 'required',
    		'username' => 'required',
    		'password' => 'required|min:8',
    		'level' => 'required',
    	]);

        
    	$data = new \App\Petugas;
        
        $data->nama_petugas = $request->nama_petugas;
    	$data->username = $request->username;
        
    	$data->password = bcrypt($request->password);
    	$data->level = $request->level;
        
    	$status = $data->save();
        
    	if ($status) {
            
    		return redirect('admin/crud/petugas')->with('success','Data Berhasil Ditambahkan');
    	} else {
            
    		return redirect('admin/tambah/petugas')->with('error','Data Gagal ditambahkan');
    	}

    }

    
    public function viewEditPetugas($id_petugas)
    {
        
    	$data['petugas'] = \App\Petugas::find($id_petugas);
        
        $data['title'] = 'Edit Data Petugas | Admin';
    	return view('admin.editTambahPetugas',$data);
    }


    public function editPetugasPost(Request $request, $id_petugas)
    {
        
    	$this->validate($request,[
            'nama_petugas' => 'required',
    		'username' => 'required',
    		'level' => 'required',
    	]);


    	$data = \App\Petugas::find($id_petugas);
        $data->nama_petugas = $request->nama_petugas;
    	$data->username = $request->username;
    	$data->level = $request->level;

    	$status = $data->update();
        
    	if ($status) {
            
    		return redirect('admin/crud/petugas')->with('success','Data Berhasil Diubah');
    	} else {
            
    		return redirect('admin/edit/petugas')->with('error','Data Gagal Diubah');
    	}
    }


    public function viewForgotPetugas($id_petugas)
    {
         
    	$data['petugas'] = \App\Petugas::find($id_petugas);
        
        $data['title'] = 'Forget Password Petugas | Admin';
    	return view('admin.forgotPetugas',$data);
    }


	public function forgotPetugasPost(Request $request, $id_petugas)
    {
        
    	$this->validate($request,[
    		'password' => 'required',
    		'cpassword' => 'same:password',
    	]);

    	$data = \App\Petugas::find($id_petugas);
    	$data->password = bcrypt($request->password);

    	$status = $data->update();
/
    	if ($status) {
            
    		return redirect('admin/crud/petugas')->with('success','Password Berhasil Diubah');
    	} else {
        
    		return redirect('admin/edit/petugas')->with('error','Password Berhasil Diubah');
    	}
    }


    public function deletePetugasPost($id_petugas)
     {
            
     	$data = \App\Petugas::find($id_petugas);

    	$status = $data->delete();

    	if ($status) {
            
    		return redirect('admin/crud/petugas')->with('success','Data Berhasil Dihapus');
    	} else {
            
    		return redirect('admin/crud/petugas')->with('error','Data Gagal Dihapus');
    	}
     }


    


    public function viewCrudSpp()
    {
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Manage Data SPP | Admin';
        return view('admin.crudSpp',$data);
    }

    public function viewTambahSpp()
    {
        $data['title'] = 'Tambah Data SPP | Admin';
        return view('admin.editTambahSpp',$data);
    }

    public function tambahSppPost(Request $request)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = new \App\Spp;
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/spp')->with('success','Data Berhasil Ditambahkan');
        } else {
            return redirect('admin/tambah/spp')->with('error','Data Gagal Ditambahkan');
        }

    }

    public function viewEditSpp($id_spp)
    {
        $data['spp'] = \App\Spp::find($id_spp);
        $data['title'] = 'Edit Data SPP | Admin';
        return view('admin.editTambahSpp',$data);
    }

    public function editSppPost(Request $request, $id_spp)
    {
        $this->validate($request,[
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $data = \App\Spp::find($id_spp);
        $data->tahun = $request->tahun;
        $data->nominal = $request->nominal;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/spp')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/edit/spp')->with('error','Data Gagal Diubah');
        }
    }

    public function deleteSppPost($id_spp)
     {
        $data = \App\Spp::find($id_spp);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/spp')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('admin/crud/spp')->with('error','Data Gagal Dihapus');
        }
     }



     


    public function viewCrudKelas()
    {
        $data['kelas'] = \App\Kelas::get();
        $data['title'] = 'Manage Data Kelas | Admin';
        return view('admin.crudKelas',$data);
    }

    public function viewTambahKelas()
    {
        $data['title'] = 'Tambah Data Kelas | Admin';
        return view('admin.editTambahKelas',$data);
    }

    public function tambahKelasPost(Request $request)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = new \App\Kelas;
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/kelas')->with('success','Data Berhasil Ditambahkan');
        } else {
            return redirect('admin/tambah/spp')->with('error','Data Gagal Ditambahkan');
        }

    }

    public function viewEditKelas($id_kelas)
    {
        $data['kelas'] = \App\Kelas::find($id_kelas);
        $data['title'] = 'Edit Data Kelas | Admin';
        return view('admin.editTambahKelas',$data);
    }

    public function editKelasPost(Request $request, $id_kelas)
    {
        $this->validate($request,[
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $data = \App\Kelas::find($id_kelas);
        $data->nama_kelas = $request->nama_kelas;
        $data->kompetensi_keahlian = $request->kompetensi_keahlian;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/kelas')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/edit/kelas')->with('error','Data Gagal Diubah');
        }
    }

    public function deleteKelasPost($id_kelas)
     {
        $data = \App\Kelas::find($id_kelas);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/kelas')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('admin/crud/kelas')->with('error','Data Gagal Dihapus');
        }
     }


     


    public function viewCrudSiswa()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['title'] = 'Manage Data Siswa | Admin';
        return view('admin.crudSiswa',$data);
    }

    public function viewTambahSiswa()
    {
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Tambah Data Siswa | Admin';
        return view('admin.editTambahSiswa',$data);
    }

    public function tambahSiswaPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = new \App\Siswa;
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/siswa')->with('success','Data Berhasil Ditambahkan');
        } else {
            return redirect('admin/tambah/siswa')->with('error','Data Gagal Ditambahkan');
        }

    }

    public function viewEditSiswa($nisn)
    {
        $data['siswa'] = \App\Siswa::find($nisn);
        $data['kelas'] = \App\Kelas::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Edit Data Siswa | Admin';
        return view('admin.editTambahSiswa',$data);
    }

    public function editSiswaPost(Request $request, $nisn)
    {
        $this->validate($request,[
            'nisn' => 'required|min:10',
            'nis' => 'required|min:10',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        $data = \App\Siswa::find($nisn);
        $data->nisn = $request->nisn;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->id_kelas = $request->id_kelas;
        $data->alamat = $request->alamat;
        $data->no_telp = $request->no_telp;
        $data->id_spp = $request->id_spp;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/siswa')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/edit/siswa')->with('error','Data Gagal Diubah');
        }
    }

    public function deleteSiswaPost($nisn)
     {
        $data = \App\Siswa::find($nisn);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/siswa')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('admin/crud/siswa')->with('error','Data Gagal Dihapus');
        }
     }


     
     

    public function viewCrudPembayaran()
    {
        $data['pembayaran'] = \App\Pembayaran::get();
        $data['title'] = 'Manage Data Pembayaran | Admin';
        return view('admin.crudPembayaran',$data);
    }


    public function viewTambahPembayaran()
    {
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Tambah Data Pembayaran | Admin';
        return view('admin.editTambahPembayaran',$data);
    }

    public function tambahPembayaranPost(Request $request)
    {
        $this->validate($request,[
            'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = new \App\Pembayaran;
        $data->id_petugas = Session::get('id_petugas');
        $data->nisn = $request->nisn;
        $date = date("Y-m-d");
        $data->tgl_bayar = $date;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->save();

        if ($status) {
            return redirect('admin/crud/pembayaran')->with('success','Pembayaran SPP Berhasil');
        } else {
            return redirect('admin/tambah/pembayaran')->with('error','Pembayaran SPP Gagal');
        }

    }

    public function viewEditPembayaran($id_pembayaran)
    {
        $data['pembayaran'] = \App\Pembayaran::find($id_pembayaran);
        $data['siswa'] = \App\Siswa::get();
        $data['spp'] = \App\Spp::get();
        $data['title'] = 'Edit Data Pembayaran | Admin';
        return view('admin.editTambahPembayaran',$data);
    }

    public function editPembayaranPost(Request $request, $id_pembayaran)
    {
        $this->validate($request,[
           'nisn' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'id_spp' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $data = \App\Pembayaran::find($id_pembayaran);
        $data->nisn = $request->nisn;
        $data->bulan_dibayar = $request->bulan_dibayar;
        $data->tahun_dibayar = $request->tahun_dibayar;
        $data->id_spp = $request->id_spp;
        $data->jumlah_bayar = $request->jumlah_bayar;

        $status = $data->update();

        if ($status) {
            return redirect('admin/crud/pembayaran')->with('success','Data Berhasil Diubah');
        } else {
            return redirect('admin/edit/pembayaran')->with('error','Data Gagal Diubah');
        }
    }

    public function deletePembayaranPost($id_pembayaran)
     {
        $data = \App\Pembayaran::find($id_pembayaran);

        $status = $data->delete();

        if ($status) {
            return redirect('admin/crud/pembayaran')->with('success','Data Berhasil Dihapus');
        } else {
            return redirect('admin/crud/pembayaran')->with('error','Data Gagal Dihapus');
        }
     }

     public function exportPembayaran() {
       return Excel::download(new PembayaranExport, "Data Pembayaran.xlsx");
     }





}
