<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tag';

    public $timestamps = false;

    protected $fillable = ['consultant_id','country','major', 'type'];

}
