<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'phone',
        'email',
        'company_image',
    ];

    public function Game(){

        return $this -> belongsTo(Game::class);
    }
}
