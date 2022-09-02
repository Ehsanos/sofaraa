<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $casts = ['name' => 'object', 'description' => 'object'];

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'nation_id',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function areas()
    {
        return $this->belongsToMany(Area::class, "section_area");
    }
  public function nations()
    {
        return $this->belongsToMany(Nation::class,'section_nation');
    }
}
