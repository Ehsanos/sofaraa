<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    use HasFactory;
    protected $casts = ['name' => 'object'];

    protected $fillable = [
        'name',
    ];

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
