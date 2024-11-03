<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'subtitle',
        'normal_text',
        'highlighted_text',
        'aboute_image',
        'quote_image',
        'content',
        'about_button_name',
        'about_button_url',
        'project_completed',
        'years_of_experience'
    ];
}
