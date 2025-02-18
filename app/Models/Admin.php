<?php

namespace App\Models;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $table='users';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'username',
        'password',
        'no_telepon',
        'alamat',
        'role',
        'foto'
    ];
    protected $hidden = [
        'password',
    ];

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class, );
    }
    public function pengaduans(){
        return $this->hasMany(Pengaduan::class,);
    }
}
