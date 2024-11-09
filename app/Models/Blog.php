<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'category',
        'date',
        'author',
        'title',
        'desc',
        'button_text',
        'button_url'

    ];
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
