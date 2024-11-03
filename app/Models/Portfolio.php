<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'name',
        'desc',
        'client',
        'image',
        'button_text',
        'button_url',
        'project_date',
        'project_url'
    ];
    public function projectImage()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
