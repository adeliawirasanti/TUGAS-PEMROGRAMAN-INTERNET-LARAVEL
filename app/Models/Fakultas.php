<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas'; // tabel sudah sesuai
    protected $fillable = ['nama'];

    // Relasi: satu fakultas punya banyak program studi
    public function programstudi()
    {
        return $this->hasMany(ProgramStudi::class, 'fakultas_id');
    }

    // Relasi: satu fakultas punya banyak mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'fakultas_id');
    }
}

