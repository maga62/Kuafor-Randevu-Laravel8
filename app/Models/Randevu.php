<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randevu extends Model
{
    use HasFactory;
    public function time(){
        return $this->belongsTo(Time::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
