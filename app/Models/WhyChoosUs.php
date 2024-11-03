<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChoosUs extends Model
{
    use HasFactory;
    protected $fillable =[
        'icon',
        'title',
        'desc'
    ];
}
