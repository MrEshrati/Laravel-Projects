<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    
    use HasFactory;

    protected $fillable = [

        'name',
    ];

    public function category(){

        return $this -> belongsTo(Category::class , 'parent_id');
    }

    public function digital_content(){

        return $this -> belongsToMany(DigitalContent::class , 'digital_content_category');
    }

}
