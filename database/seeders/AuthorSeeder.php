<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Tere Liye',
            'description' => 'Penulis Indonesia yang terkenal dengan karya bertema keluarga, petualangan, dan nilai kehidupan.'
        ]);

        Author::create([
            'name' => 'Mark Manson',
            'description' => 'Penulis asal Amerika Serikat yang dikenal dengan gaya blak-blakan dalam buku pengembangan diri.'
        ]);

        Author::create([
            'name' => 'Masashi Kishimoto',
            'description' => 'Mangaka asal Jepang yang mendunia berkat seri Naruto yang fenomenal.'
        ]);

        Author::create([
            'name' => 'Pramoedya Ananta Toer',
            'description' => 'Sastrawan besar Indonesia yang banyak menulis tentang kolonialisme dan perjuangan rakyat.'
        ]);

        Author::create([
            'name' => 'Henry Manampiring',
            'description' => 'Penulis Indonesia yang memperkenalkan konsep Stoikisme kepada pembaca lokal melalui pendekatan praktis.'
        ]);
    }
}
