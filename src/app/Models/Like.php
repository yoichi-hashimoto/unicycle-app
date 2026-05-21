<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'practice_id',
        'history_id',
        ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function practice(){
        return $this->belongsTo(Practice::class);
    }
    public function history(){
        return $this->belongsTo(History::class);
    }

    public function totalLikes($historyId){
        return $this->where('history_id', $historyId)->count();
    }
}
