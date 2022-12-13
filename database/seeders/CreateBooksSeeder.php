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
            'publicator_id' => '1',
            'author' => ['Emily Brontë'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Middlemarch',
            'publicator_id' => '1',
            'author' => ['George Eliot'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Nineteen Eighty-Four',
            'publicator_id' => '1',
            'author' => ['George Orwell'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'The Lord of the Rings',
            'publicator_id' => '1',
            'author' => ['J.R.R. Tolkien'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Diary of a Nobody',
            'publicator_id' => '1',
            'author' => ['George'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'His Dark Materials',
            'publicator_id' => '1',
            'author' => ['Philip Pullman'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Jane Eyre',
            'publicator_id' => '1',
            'author' => ['Charlotte Brontë'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Great Expectations',
            'publicator_id' => '1',
            'author' => ['Charles Dickens'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Rebecca',
            'publicator_id' => '2',
            'author' => ['Daphne du Maurier'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Far from the Madding Crowd',
            'publicator_id' => '2',
            'author' => ['Thomas Hardy'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Brideshead Revisited',
            'publicator_id' => '2',
            'author' => ['Evelyn Waugh'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Robinson Crusoe',
            'publicator_id' => '2',
            'author' => ['Daniel Defoe'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Gulliver’s Travels',
            'publicator_id' => '2',
            'author' => ['Jonathan Swift'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Tristram Shandy',
            'publicator_id' => '2',
            'author' => ['Tristram Shandy'],
        ]);
        Books::create([
            'uuid' => Str::uuid()->toString(),
            'book_name' => 'Jane Eyre',
            'publicator_id' => '2',
            'author' => ['Charlotte Bronte'],
        ]);
    }
}
