<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class Messagebox extends Model
{
    //

    protected $table = 'message';

    protected $fillable = ['sender', 'receiver', 'title', 'content', 'sendtime', 'type', 'state'];

}
