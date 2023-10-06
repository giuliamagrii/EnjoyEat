<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owner';
    public $timestamps = false;
    use HasFactory;
    
    protected $fillable = ['username', 'password', 'email', 'name','surname'];
    
    public function restaurant() {
        return $this->hasOne(Restaurant::class, 'owner_id');
    }
}
