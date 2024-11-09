<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_logo',
        'banner_title',
        'banner_sub_title',
        'banner_button_name',
        'banner_button_url',
        'banner_video_button',
        'banner_video_url',
        'feature_title',
        'brand_title',
        'about_title',
        'service_title',
        'service_subtitle',
        'why_choose_us_title',
        'why_choose_us_subtitle',
        'why_choose_us_description',
        'why_choose_us_image',
        'project_title',
        'project_subtitle',
        'faq_title',
        'faq_subtitle',
        'faq_image',
        'faq_video_url',
        'testimonial_title',
        'testimonial_subtitle',
        'testimonial_image',
        'blog_title',
        'blog_subtitle',
        'package_title',
        'package_subtitle',
        'team_title',
        'team_subtitle',
        'cta_title',
        'cta_subtitle',
        'cta_image',
        'footer_logo',
        'newsletter_title',
        'newsletter_subtitle',
        'facebook_url',
        'twitter_url',
        'youtube_url',
        'linkden_url',
        'footer_desc',
        'copyright_text',
        'primary_color',
        'secondary_color'
    ];
    public function bannerImages()
    {
        return $this->hasMany(BannerImage::class);
    }
}
