<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studis'; // fix: sesuai migration
    protected $fillable = ['nama', 'fakultas_id'];

    // Relasi: satu program studi milik satu fakultas
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }

    // Relasi: satu program studi punya banyak mahasiswa
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi_id');
    }
}
