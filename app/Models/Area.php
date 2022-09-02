<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    protected $casts = ['name' => 'object'];

    public function offices()
    {
        return $this->belongsToMany(Office::class, "office_area");
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class, 'section_area');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_area');
    }
    public function campings()
    {
        return $this->hasMany(Campaign::class);
    }
}
