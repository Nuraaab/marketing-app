<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_image',
        'site_data_id',
    ];
    public function siteData()
    {
        return $this->belongsTo(SiteData::class);
    }
}
