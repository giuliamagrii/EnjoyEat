<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['name', 'image'];
    
    public function restaurants() {
        return $this->hasMany(Restaurant::class,'food_id');
    }

}