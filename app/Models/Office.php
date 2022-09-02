<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $casts=['name' =>'object','description' =>'object'];
    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];

    public function areas()
    {
        return $this->belongsToMany(Area::class, "office_area");
    }
    public function nation()
    {
        return $this->belongsTo(Nation::class);
    }
}
