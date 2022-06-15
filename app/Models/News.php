<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    public $primaryKey = "id";
    protected $fillable = [
        "title","photo","deskripsi","owner_id"
    ];

    public static function getNews() {
        $return = News::join('users','news.owner_id', '=', 'users.id')
        ->select('news.*', 'users.name')->get();
        return $return;
    }

    public function user(){
        return $this->belongsTo(User::class,'id');
    }
}
