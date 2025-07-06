<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materis')->insert([
            [
            'judul' => 'Waspada Malware dari Situs Ilegal!',
            'deskripsi' => 'Mengunduh dari situs ilegal meningkatkan risiko perangkat Anda terinfeksi malware, seperti virus, spyware, atau ransomware yang dapat merusak data dan mencuri informasi pribadi.',
            'gambar' => 'https://placehold.co/600x400/ff0000/FFFFFF?text=Malware',
            'video' => 'https://example.com/videos/malware.mp4',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'judul' => 'Risiko Pencurian Identitas di Balik Konten Bajakan',
            'deskripsi' => 'Situs-situs ilegal seringkali menjadi sarang bagi phising dan penipuan. Informasi pribadi dan finansial Anda bisa dicuri dan disalahgunakan.',
            'gambar' => 'https://placehold.co/600x400/E97451/FFFFFF?text=Phishing',
            'video' => 'https://example.com/videos/phishing.mp4',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'judul' => 'Dampak Hukum Mengakses Konten Ilegal',
            'deskripsi' => 'Mengakses atau menyebarkan konten yang dilindungi hak cipta tanpa izin adalah pelanggaran hukum dan dapat berujung pada sanksi denda hingga pidana.',
            'gambar' => 'https://placehold.co/600x400/0000ff/FFFFFF?text=Hukum',
            'video' => 'https://example.com/videos/hukum.mp4',
            'created_at' => now(),
            'updated_at' => now(),
            ],
        ]);
    }
}
