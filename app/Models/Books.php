<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $casts = [ 'author' => 'array'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
