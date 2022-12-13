<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Wuthering Heights',
            'publication' => 'Independently published',
            'author' => ['Emily Brontë'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Middlemarch',
            'publication' => 'Independently published',
            'author' => ['George Eliot'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Nineteen Eighty-Four',
            'publication' => 'Independently published',
            'author' => ['George Orwell'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'The Lord of the Rings',
            'publication' => 'Independently published',
            'author' => ['J.R.R. Tolkien'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Diary of a Nobody',
            'publication' => 'Independently published',
            'author' => ['George'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'His Dark Materials',
            'publication' => 'Independently published',
            'author' => ['Philip Pullman'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Jane Eyre',
            'publication' => 'Independently published',
            'author' => ['Charlotte Brontë'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Great Expectations',
            'publication' => 'Independently published',
            'author' => ['Charles Dickens'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Rebecca',
            'publication' => 'Independently published 2',
            'author' => ['Daphne du Maurier'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Far from the Madding Crowd',
            'publication' => 'Independently published 2',
            'author' => ['Thomas Hardy'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Brideshead Revisited',
            'publication' => 'Independently published 2',
            'author' => ['Evelyn Waugh'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Robinson Crusoe',
            'publication' => 'Independently published 2',
            'author' => ['Daniel Defoe'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Gulliver’s Travels',
            'publication' => 'Independently published 2',
            'author' => ['Jonathan Swift'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Tristram Shandy',
            'publication' => 'Independently published 2',
            'author' => ['Tristram Shandy'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Jane Eyre',
            'publication' => 'Independently published 2',
            'author' => ['Charlotte Bronte'],
        ]);
    }
}
