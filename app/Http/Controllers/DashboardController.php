<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $jumlahMasyarakat = Admin::where('role', 'masyarakat')->count();
    $jumlahKategori = Kategori::count();
    $jumlahLaporan = Pengaduan::count();
    $jumlahLaporanBaru = Pengaduan::where('status', '0')->count();
    $jumlahLaporanSelesai = Pengaduan::where('status', 'selesai')->count();

    // Ambil data pengaduan dengan pagination
    $pengaduans = Pengaduan::paginate(3);

    return view('pagesadmin.dashboard_admin', compact('jumlahMasyarakat', 'jumlahKategori', 'jumlahLaporan', 'jumlahLaporanBaru', 'jumlahLaporanSelesai', 'pengaduans'));
}


public function profil(){
    $profiles = Admin::all();
    return view('pagesadmin.profile.data_profile',compact('profiles'));
}

}
