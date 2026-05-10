<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'animal_path',
        'min_level',
        'max_level',
        'description',
        ];

    public function practice(){
        return $this->belongsTo(Practice::class);
    }

}
