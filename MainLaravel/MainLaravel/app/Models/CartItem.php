<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable=[

        'price',
        'discount',
        'count'
    ];

    public function digital_content(){

        return $this -> belongsTo(DigitalContent::class);
    }

    public function user(){

        return $this -> belongsTo(User::class);
    }

    public function PriceCalculate(){

        return $this->price * $this->count;
    }

    public function DiscountCalculate(){

        return $this->discount * $this->count;
    }


}
