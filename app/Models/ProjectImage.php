<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image'
    ];
    public function projects()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
