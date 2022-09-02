<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $casts = ['title' => 'object',  'image_url' => 'object', 'description' => 'object',
     'images_ar' => 'object',
        'images_tr' => 'object',
        'images_en' => 'object',
    ];

    protected $fillable = [
        'section_id',
        'campaign_id',
        'title',
        'description',
        'image_url',
        'vedio_url',
        'area_id',
        'total_amount',
        'number_of_donors',
        'current_amount',
        'finish_state',
        'image_url'
    ];
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function areas()
    {
        return $this->belongsToMany(Area::class, "project_area");
    }
}
