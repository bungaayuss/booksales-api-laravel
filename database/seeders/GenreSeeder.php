<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Action',
            'description' => 'Genre yang menekankan pada aksi'
        ]);

        Genre::create([
            'name' => 'Fiksi',
            'description' => 'Cerita rekaan yang bersifat imajinatif dan tidak berdasarkan kisah nyata.'
        ]);

        Genre::create([
            'name' => 'Non-Fiksi',
            'description' => 'Buku yang berisi informasi atau cerita berdasarkan fakta dan kenyataan.'
        ]);

        Genre::create([
            'name' => 'Komik',
            'description' => 'Buku bergambar yang menceritakan cerita dalam bentuk panel dan dialog visual.'
        ]);

        Genre::create([
            'name' => 'Sejarah',
            'description' => 'Buku yang membahas peristiwa atau tokoh-tokoh penting di masa lalu.'
        ]);

        Genre::create([
            'name' => 'Filsafat',
            'description' => 'Buku yang membahas konsep-konsep pemikiran, eksistensi, dan nilai-nilai hidup.'
        ]);
    }
}
