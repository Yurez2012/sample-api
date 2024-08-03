<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'google_id',
        'title',
        'description',
        'original_url',
        'url',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
