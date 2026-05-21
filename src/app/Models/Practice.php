<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'level',
        'updated_at',
    ];

    public function histories(){
        return $this->hasMany(History::class);
    }

    public function animals(){
        return $this->hasMany(Animal::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'histories')
        ->withPivot('is_passed')
        ->withTimestamps();
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

}
