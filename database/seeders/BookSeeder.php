<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yag kembali ke desa kelahirannya',
            'price' => 40000,
            'stock' => 15
        ]);

        Book::create([
            'title' => 'Sebuah seni untuk bersikap bodo amat',
            'description' => 'Buku yang membahas tetang kehidupan dan filosofi hidup seseorang',
            'price' => 25000,
            'stock' => 5
        ]);

        Book::create([
            'title' => 'Naruto',
            'description' => 'Buku yang membahas jalan ninja seseorang',
            'price' => 30000,
            'stock' => 55
        ]);

        Book::create([
            'title' => 'Bumi Manusia',
            'description' => 'Novel berlatar masa kolonial yang menggambarkan perjuangan cinta, identitas, dan keadilan.',
            'price' => 50000,
            'stock' => 20
        ]);

        Book::create([
            'title' => 'Filosofi Teras',
            'description' => 'Panduan hidup dengan pendekatan Stoikisme untuk menghadapi stres dan tekanan hidup.',
            'price' => 45000,
            'stock' => 10
        ]);

    }
}
