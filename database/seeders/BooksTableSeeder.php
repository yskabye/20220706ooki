<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'author_id' => 1,
            'title' => '桃太郎',
        ];
        Book::create($param);
        $param = [
            'author_id' => 3,
            'title' => '白雪姫',
        ];
        Book::create($param);
        $param = [
            'author_id' => 3,
            'title' => 'シンデレラ',
        ];
        Book::create($param);
        $param = [
            'author_id' => 3,
            'title' => '３匹の子豚',
        ];
        Book::create($param);
    }
}
