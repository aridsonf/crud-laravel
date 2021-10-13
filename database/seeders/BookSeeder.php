<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelBook;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ModelBook $books)
    {
        $books->create([
            'title'=>'Livro 1',
            'prices'=>'2',
            'id_user'=>'1',
            'pages'=>'2'
        ]);
        $books->create([
            'title'=>'Livro 2',
            'prices'=>'1',
            'id_user'=>'1',
            'pages'=>'1'
        ]);
        $books->create([
            'title'=>'Livro 3',
            'prices'=>'3',
            'id_user'=>'1',
            'pages'=>'3'
        ]);
    }
}
