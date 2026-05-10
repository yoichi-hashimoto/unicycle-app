<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\MemberAvatar;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login_id',
        'password',
        'member_avatar_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar(){
        return $this->belongsTo(MemberAvatar::class,'member_avatar_id');
    }

    public function histories(){
        return $this -> hasMany(History::class);
    }

    public function getCurrentLevelAttribute(){
        $history = $this->histories()
        ->whereHas('practice')
        ->with('practice')
        ->latest()->first();

        return $history && $history->practice?
        $history->practice->level:null;
    }

    public function getMatchedAnimalAttribute(){
        $current_level=$this->getCurrentLevelAttribute();
        if(is_null($current_level)){
            return null;
        }
        return Animal::where('min_level','<=',$current_level)
        ->where('max_level','>=',$current_level)
        ->first();
    }
}
