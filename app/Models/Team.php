<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'role',
        'image',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'github_url'
    ];
}
