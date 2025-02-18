<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Menggunakan model User sesuai tabel users

class PegawaiController extends Controller {

    // Display a listing of the petugas
    public function index() {
        $petugass = User::whereIn('role', ['admin', 'petugas'])->get();
        return view('pagesadmin.pegawai.data_pegawai', compact('petugass'));
    }

    // Show the form for creating a new petugas
    public function create() {
        return view('pagesadmin.pegawai.tambah_pegawai');
    }

    // Store a newly created petugas in the database
    public function store(Request $request) {

        // Validasi data input
        $request->validate([
            'nik' => 'required|string|max:16|unique:users,nik',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas',
        ]);

        // Simpan data ke tabel users
        Admin::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Hash password
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return redirect('pegawai')->with('success', 'Petugas berhasil ditambahkan!');
    }

    // Show the form for editing the specified petugas
    public function edit($id) {
        $pegawai = User::findOrFail($id);
        return view('pagesadmin.pegawai.edit_pegawai', compact('pegawai'));
    }

    // Update the specified petugas in the database
    public function update(Request $request, $id)
{
    $petugas = Admin::findOrFail($id);

    $request->validate([
        'nik' => 'required|string|max:16|unique:users,nik,' . $id,
        'nama_lengkap' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'username' => 'required|string|max:255|unique:users,username,' . $id,
        'password' => 'nullable|string|min:8',
        'no_telepon' => 'required|string|max:15|regex:/^[0-9]+$/',
        'alamat' => 'required|string|max:255',
        'role' => 'required|in:admin,petugas,masyarakat',
    ]);

    $petugas->update([
        'nik' => $request->nik,
        'nama_lengkap' => $request->nama_lengkap,
        'jenis_kelamin' => $request->jenis_kelamin,
        'username' => $request->username,
        'password' => $request->filled('password') ? bcrypt($request->password) : $petugas->password,
        'no_telepon' => $request->no_telepon,
        'alamat' => $request->alamat,
        'role' => $request->role,
    ]);

    return redirect('/pegawai')->with('success', 'Petugas berhasil diperbarui!');
}



    // Remove the specified petugas from the database
    public function destroy($id) {
        $petugas = Admin::findOrFail($id);
        $petugas->delete();

        return response()->json(['success' => true, 'message' => 'Petugas berhasil dihapus.']);
    }
}
