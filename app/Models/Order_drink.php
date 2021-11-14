<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Drink;
class Order_drink extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'orders_drink';

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function drink(){
        return $this->belongsTo(Drink::class);
    }
}
