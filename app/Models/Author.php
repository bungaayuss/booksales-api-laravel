<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    private $authors = [
        [
            'id' => 1,
            'name' => 'Tere Liye',
            'description' => 'Penulis Indonesia yang terkenal dengan karya bertema keluarga, petualangan, dan nilai kehidupan.'
        ],
        [
            'id' => 2,
            'name' => 'Mark Manson',
            'description' => 'Penulis asal Amerika Serikat yang dikenal dengan gaya blak-blakan dalam buku pengembangan diri.'
        ],
        [
            'id' => 3,
            'name' => 'Masashi Kishimoto',
            'description' => 'Mangaka asal Jepang yang mendunia berkat seri Naruto yang fenomenal.'
        ],
        [
            'id' => 4,
            'name' => 'Pramoedya Ananta Toer',
            'description' => 'Sastrawan besar Indonesia yang banyak menulis tentang kolonialisme dan perjuangan rakyat.'
        ],
        [
            'id' => 5,
            'name' => 'Henry Manampiring',
            'description' => 'Penulis Indonesia yang memperkenalkan konsep Stoikisme kepada pembaca lokal melalui pendekatan praktis.'
        ]
    ];

    public function getAuthors(){
        return $this->authors;
    }
}
