<?php

namespace App\Models;

use DigitalContents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionInvoice extends Model{

    use HasFactory;

    protected $fillable = [

        'price',
        'discount',
        'count',

    ];

    public function transactions(){

        return $this -> belongsTo(Transaction::class , 'transaction_id');
    }

    public function digital_content(){

        return $this -> belongsTo(DigitalContent::class);
    }
}
