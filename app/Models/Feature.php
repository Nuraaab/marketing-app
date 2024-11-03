<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'package_id',
        'status'
    ];

    // Relationship: A Feature belongs to one Package
    public function package() // Singular
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}

