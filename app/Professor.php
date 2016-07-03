<?php

namespace NeverTest;

use NeverTest\User;
use NeverTest\Tag;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    protected $table = 'professor';
    public $timestamps = false;
    protected $fillable = ['name','university','position','introduction','photoaddr'];



}
