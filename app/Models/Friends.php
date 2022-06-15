<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $table = 'friends';
    protected $fillable = ['firstname', 'lastname', 'phone'];

    public function user(){
        return $this->belongsToMany(User::class, 'user_friends','friend_id','user_id')->withTimestamps();
    }
}
