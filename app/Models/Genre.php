<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1,
            'name' => 'Fiksi',
            'description' => 'Cerita rekaan yang bersifat imajinatif dan tidak berdasarkan kisah nyata.'
        ],
        [
            'id' => 2,
            'name' => 'Non-Fiksi',
            'description' => 'Buku yang berisi informasi atau cerita berdasarkan fakta dan kenyataan.'
        ],
        [
            'id' => 3,
            'name' => 'Komik',
            'description' => 'Buku bergambar yang menceritakan cerita dalam bentuk panel dan dialog visual.'
        ],
        [
            'id' => 4,
            'name' => 'Sejarah',
            'description' => 'Buku yang membahas peristiwa atau tokoh-tokoh penting di masa lalu.'
        ],
        [
            'id' => 5,
            'name' => 'Filsafat',
            'description' => 'Buku yang membahas konsep-konsep pemikiran, eksistensi, dan nilai-nilai hidup.'
        ]
    ];

    public function getGenres(){
        return $this->genres;
    }
}
