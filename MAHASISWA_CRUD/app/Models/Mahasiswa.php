<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel (otomatis juga bisa, tapi kita tulis biar jelas)
    protected $table = 'mahasiswas';

    // Kolom yang boleh diisi (harus sama dengan yang ada di tabel)
    protected $fillable = ['nim', 'nama', 'prodi'];
}
