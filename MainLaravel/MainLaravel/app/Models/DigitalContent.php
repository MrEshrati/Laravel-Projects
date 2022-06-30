<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalContent extends Model{

    use HasFactory;

    protected $fillable = [

        'name',
        'price',
        'discount',
        'description',
        'digital_content_type_id',
        'image_url',
        'status',
        'content_url'
    ];

    public function digital_content_type(){

        return $this->belongsTo(DigitalContentType::class);
    }

    public function category(){

        return $this -> belongsToMany(Category::class , 'digital_content_category');
    }

    public function transaction_invoice(){

        return $this -> hasMany(TransactionInvoice::class);
    }
}
