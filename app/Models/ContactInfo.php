<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'top_title',
        'top_subtitle',
        'top_desc',
        'image',
        'email',
        'phone',
        'adress',
        'map_link',
        'title',
        'subtitle',
        'button_text',
        'button_url',
    ];
}
