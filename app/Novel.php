<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{

    protected $table="tb_novel";

    protected $fillable = [
        'novel_title','novel_genre','novel_synopsis','novel_story','novel_status','novel_cover'
    ];

    public function  usersWhoFavorited(){
        return $this->belongsToMany('App\User', 'favorites', 'id', 'novel_id');
    }
}
