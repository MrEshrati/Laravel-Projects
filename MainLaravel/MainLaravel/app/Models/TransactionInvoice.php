<?php

namespace App\Models;

use DigitalContents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionInvoice extends Model{

    use HasFactory;

    public function transactions(){

        return $this -> belongsTo(Transaction::class);
    }

    public function digital_content(){

        return $this -> belongsTo(DigitalContent::class);
    }
}
