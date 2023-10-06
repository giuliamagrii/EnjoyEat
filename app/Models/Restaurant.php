<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurant';
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'phonenumber', 'street', 'city', 'postalcode', 'country', 'description', 'averageprice','owner_id','food_id'];
    
    public function owner() {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function customers() {
        return $this->belongsToMany(Customer::class, 'restaurant_customer');
    }

    public function reviews() {
        return $this->hasMany(Review::class,'restaurant_id');
    }

    public function foods() {
        return $this->belongsTo(Food::class,'food_id');
    }

}
