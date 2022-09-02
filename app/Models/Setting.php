<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'address',
        'name',
        'email',
        'phone',
        'face_book',
        'twitter',
        'youtube',
        'whatsapp',
        'linkedin',
        'instagram',
        'instagram',
    ];
    protected $casts = [
        'address' => 'object'
    ];
}
