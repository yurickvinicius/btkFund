<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    protected $fillable = [
        'magic_number',
        'paper'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
