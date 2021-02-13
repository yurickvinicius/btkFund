<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RobotUser extends Model
{

    protected $table = 'robots_users';

    protected $fillable = [
        'user_id', 'robot_id',
    ];
}
