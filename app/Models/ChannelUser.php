<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelUser extends Model
{
    use HasFactory;

    protected $table = 'channel_users';

    protected $fileable = [
        'user_id',
        'channel_id',
    ];

    protected $guarded = [
        'user_id',
        'channel_id',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class, 'channel_user', 'channel_id', 'user_id');
    }
}
