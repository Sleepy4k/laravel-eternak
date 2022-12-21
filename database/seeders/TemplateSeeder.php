<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'name' => 'farm',
                'header' => json_encode([
                    'nama_ternak',
                    'jenis_kelamin',
                    'ras',
                    'tanggal_lahir',
                    'berat_badan',
                    'panjang_badan',
                    'tinggi_badan',
                    'status',
                    'nomor_induk_pejantan',
                    'nomor_induk_betina'
                ]),
                'body' => json_encode([
                    [
                        'nama_ternak' => 'Bagus',
                        'jenis_kelamin' => 'jantan',
                        'ras' => 'etawa',
                        'tanggal_lahir' => now()->format('d-m-Y'),
                        'berat_badan' => '45',
                        'panjang_badan' => '120',
                        'tinggi_badan' => '60',
                        'status' => 'hidup',
                        'nomor_induk_pejantan' => 'kb-21502302',
                        'nomor_induk_betina' => 'kb-56666409'
                    ],
                    [
                        'nama_ternak' => 'Indah',
                        'jenis_kelamin' => 'betina',
                        'ras' => 'boer',
                        'tanggal_lahir' => now()->format('d-m-Y'),
                        'berat_badan' => '37',
                        'panjang_badan' => '138',
                        'tinggi_badan' => '45',
                        'status' => 'hidup',
                        'nomor_induk_pejantan' => 'kb-21502302',
                        'nomor_induk_betina' => 'kb-56666409'
                    ]
                ])
            ],
            [
                'name' => 'medical',
                'header' => json_encode([
                    'umur',
                    'tinggi_badan',
                    'berat_badan',
                    'status',
                    'catatan',
                    'tanggal_pencatatan'
                ]),
                'body' => json_encode([
                    [
                        'umur' => '0-2',
                        'tinggi_badan' => '123',
                        'berat_badan' => '40',
                        'status' => 'hidup',
                        'catatan' => 'kambing sehat dan bergizin',
                        'tanggal_pencatatan' => now()->format('d-m-Y')
                    ],
                    [
                        'umur' => '2-4',
                        'tinggi_badan' => '456',
                        'berat_badan' => '35',
                        'status' => 'mati',
                        'catatan' => 'kambing mati terkena penyakit flu',
                        'tanggal_pencatatan' => now()->format('d-m-Y')
                    ]
                ])
            ]
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}