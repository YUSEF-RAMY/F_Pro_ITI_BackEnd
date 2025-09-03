<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'author',
        'published_year',
        'quantity',
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
