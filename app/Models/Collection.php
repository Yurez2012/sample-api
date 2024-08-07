<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';

    protected $appends = [
        'type',
    ];

    protected $fillable = [
        'user_id',
        'model_id',
        'model_type',
        'rating',
    ];


    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    public function getTypeAttribute()
    {
        return Str::replace('App\Models\\', '', $this->model_type) . 's';
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
