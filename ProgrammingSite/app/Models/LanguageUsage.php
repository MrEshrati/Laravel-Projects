<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageUsage extends Model
{
    use HasFactory;

    public function language(){

        return $this->belongsTo(Language::class);
    }

    public function usage(){

        return $this->hasMany(Usage::class);
    }
}
