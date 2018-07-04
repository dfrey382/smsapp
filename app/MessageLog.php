<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class MessageLog extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recepient', 'message','status'
    ];

}
