<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    #Many to One
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function randevu(){
        return $this->hasMany(Randevu::class);
    }
}
