<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $casts = ['title' => 'object', 'description' => 'object','url'=> 'object'];

    protected $fillable = [
        'url',
        'title',
        'description'
    ];


}
