<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'operation_type',
        'operation_volume',
        'entry_price',
        'exit_price',
        'stop_loss',
        'take_profit',
        'result_profit',
        'current_profit',
        'data_hour_operation',
        'robot_id'
    ];
}
