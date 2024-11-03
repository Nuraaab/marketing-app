<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'is_popular',
        'name',
        'desc',
        'price',
        'unit',
        'duration',
        'button_text',
        'button_url'
    ];

    // Relationship: A Package has many Features
    public function features()
    {
        return $this->hasMany(Feature::class, 'package_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
