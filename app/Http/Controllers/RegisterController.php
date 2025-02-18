<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('pagesmasyarakat.register_masyarakat');
    }

    public function authregister(Request $request)
    {
        $dataValidasi = $request->validate([
            'textNik'   => 'required',
            'textName'  => 'required',
            'textUsername'  => 'required',
            'textEmail'     => 'required',
            'textPassword'  => 'required',
            'textAlamat'    => 'required|string|max:500',
            'textNoTelp'    => 'required'
        ]);
        $dataRegisterMasyarakat = [
            'nik'   => $request->textNik,
            'name'  => $request->textName,
            'username'  => $request->textUsername,
            'email'     => $request->textEmail,
            'alamat' => $request->textAlamat,
            'password'  => bcrypt($request->textPassword),
            'no_telp'   => $request->textNoTelp
        ];
        Masyarakat::create($dataRegisterMasyarakat);
        return redirect('/loginmasyarakat');
    }

 }