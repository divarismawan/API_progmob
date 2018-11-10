<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Novel extends Model
{
    use Notifiable;
    protected $table = "tb_novel";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'novel_name', 'novel_date'
    ];
}
