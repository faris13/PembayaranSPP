<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function viewHomeSiswa()
    {
        
    	$nisn = Session::get('nisn');
    	$data['pembayaran'] = \App\Pembayaran::where('nisn',$nisn)->get();
        $data['title'] = 'Pembayaran SPP | Siswa';
    	
    	if (!Session::get('login')) {    		
    		return redirect('/');
    	}else{
    		if (!Session::get('level')) {
    			return view('siswa.home',$data)->with('success','Selamat Datang di Website Pembayaran SPP');
            }else{
                return redirect('/');
            }
                
    	}
    }
}
