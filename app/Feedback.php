<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;
use NeverTest\User;
use NeverTest\Classunit;

class Feedback extends Model
{
    //
    protected $table = 'feedback';

    protected $fillable = ['created_at','user_id','class_id', 'title', 'content', 'phone', 'email'];


}
