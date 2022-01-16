<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $appends = [
        'parent'
    ];
    #one to many
    public function services(){
        return $this->hasMany(Service::class);
    }
    #one to many iverse
    public function parent(){
        return $this->belongsTo(Category::class,"parent_id");
    }
    #many to one
    public function children(){
        return $this->hasMany(Category::class,"parent_id");
    }
}
