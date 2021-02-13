<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    protected $fillable = [
        'magicNumber',
        'paper'
    ];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
