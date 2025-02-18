<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'judul_pengaduan',
        'masyarakat_id',
        'kategori_id',
        'alamat',
        'isi_pengaduan',
        'foto',
        'status',
    ];

    // Relasi ke model Masyarakat (bukan Admin)
    public function masyarakat()
    {
        return $this->belongsTo(Admin::class, 'masyarakat_id');
    }

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke model Tanggapan
    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
    public function petugas()
    {
        return $this->belongsTo(Admin::class, 'masyarakat_id');
    }
    public function tanggapan()
{
    return $this->hasMany(Tanggapan::class, 'pengaduan_id');
}

}
