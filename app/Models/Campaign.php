<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $casts = ['title' => 'object', 'description' => 'object',  'image_url' => 'object',];

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'project_id',
        'section_id',
        'vedio_url',
        'nation_id',
        'status',
        'number_of_donors',
        'total_amount',
        'current_amount'
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
   public function nations()
    {
        return $this->belongsToMany(Nation::class,'campaign_nation');
    }
}
