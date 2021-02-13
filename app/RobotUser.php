<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RobotUser extends Model
{

    protected $table = 'robot_user';

    protected $fillable = [
        'user_id', 'robot_id',
    ];
}
