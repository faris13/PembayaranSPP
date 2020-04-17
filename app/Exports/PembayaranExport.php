<?php

namespace App\Exports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection() {
      return Pembayaran::join('petugas','pembayaran.id_petugas', '=','petugas.id_petugas')
                        ->join('siswa','pembayaran.nisn', '=','siswa.nisn')
                        ->join('kelas','siswa.id_kelas', '=','kelas.id_kelas')
                        ->select('pembayaran.id_pembayaran','petugas.nama_petugas','siswa.nama','pembayaran.tgl_bayar','pembayaran.bulan_dibayar',
                        'pembayaran.tahun_dibayar','kelas.nama_kelas','pembayaran.jumlah_bayar')->get();
    }




    public function headings(): array
    {
        return [
            'ID Pembayaran',
            'Petugas',
            'Nama Siswa',
            'Tanggal',
            'Bulan',
            'Tahun',
            'Kelas',
            'Jumlah Bayar'
        ];
    }
}
