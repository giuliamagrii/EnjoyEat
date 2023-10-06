<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['username', 'password','name','surname','city','email'];
    
    public function restaurants() {
        return $this->belongsToMany(Restaurant::class,'restaurant_customer');
    }
    
    public function reviews() {
        return $this->hasMany(Review::class, 'customer_id');
    }
}
