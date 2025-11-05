<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramStudi;
use App\Models\Fakultas;

class ProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        // Dapatkan semua fakultas
        $hukum = Fakultas::where('nama', 'Fakultas Hukum')->first();
        $teknik = Fakultas::where('nama', 'Fakultas Teknik')->first();
        $kedokteran = Fakultas::where('nama', 'Fakultas Kedokteran')->first();

        // Isi Program Studi berdasarkan fakultas
        $data = [
            $hukum->id => ['Ilmu Hukum'],
            $teknik->id => [
                'Arsitektur', 'Teknik Sipil', 'Teknik Elektro',
                'Teknik Mesin', 'Teknologi Informasi',
                'Teknik Industri', 'Teknik Lingkungan'
            ],
            $kedokteran->id => [
                'Pendidikan Dokter', 'Fisioterapi', 'Kesehatan Masyarakat',
                'Keperawatan', 'Psikologi', 'Kedokteran Gigi'
            ],
        ];

        foreach ($data as $fakultas_id => $prodiList) {
            foreach ($prodiList as $prodi) {
                ProgramStudi::create([
                    'nama' => $prodi,
                    'fakultas_id' => $fakultas_id
                ]);
            }
        }
    }
}
