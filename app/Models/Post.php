<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //テーブル名指定
    protected $table = 'posts';

    protected $guarded = [
        'id',
        'title',
        'content',
        'image',
        'updated_at' => 'datetime:Y-m-d',
    ];
}
