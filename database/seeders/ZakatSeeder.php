<?php

namespace Database\Seeders;

use App\Models\Zakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $data = [];
            for ($i = 0; $i < 163; $i++) {
                $data[] = [
                    'tgl_zakat' => now(),
                    'nama' => 'Masjid Roudlotul Ulum',
                    'harga_per_zakat' => null,
                    'harga_total' => null,
                    'alamat' => 'Jl. Dupak Baru 3',
                    'jumlah_zakat' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Zakat::insert($data);
        });
    }
}
