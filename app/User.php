<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    // protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password',
    ];

    public function getCreatedAtAttribute($value){
        $date = date('Y-m-d h:i:s a',$value);
        return Carbon::parse($date)->format('Y-m-d h:i:s a');
    }

    public function getUpdatedAtAttribute($value){
        $date = date('Y-m-d h:i:s a',$value);
        return Carbon::parse($date)->format('Y-m-d h:i:s a');
    }

    public function getUserDetail($userId){
        $data = Self::where(['id' => $userId , 'status' => 1])
            ->first();
        return $data;
    }

    /*public function getProfileImageAttribute($value){
        
    }*/
}
