<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = ['score', 'menu_score', 'service_score', 'bill_score', 'location_score','date', 'comment', 'customer_id','restaurant_id'];
    
    public function restaurant() {
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
