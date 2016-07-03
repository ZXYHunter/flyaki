<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class Classunit extends Model
{
    //
    protected $table = 'class';

    protected $fillable = ['time','type', 'consultant_id', 'status', 'student_id', 'price', 'starttime','introduction', 'comment','expectation'];
    public function user()
    {
        return $this->belongsTo('NeverTest\User','student_id','id');
    }
    public function consultant()
    {
        return $this->belongsTo('NeverTest\Consultant','consultant_id','id');
    }
    public function order()
    {
        return $this->hasOne('NeverTest\Order','class_id','id');
    }

}
