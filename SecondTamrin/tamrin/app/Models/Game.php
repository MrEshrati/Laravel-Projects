<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'game_image',
    ];

    public function Company(){

        return $this -> belongsTo(Company::class);
    }
}
