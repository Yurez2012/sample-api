<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  Str::replace('http', 'https', $value),
        );
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
