<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $casts=['title' =>'object','description' =>'object'];

    protected $fillable = [
        'title',
        'description',
        'image',
         'is_archive',
        'video'
    ];
    
     public function nations()
    {
        return $this->belongsToMany(Nation::class,'post_nation');
    }
}
