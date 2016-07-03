<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;
use NeverTest\User;
use NeverTest\Classunit;

class Order extends Model
{
    //
    protected $table = 'order';

    protected $fillable = ['chosenTime','consultant_id','class_id', 'created_at', 'student_id', 'fee', 'goodsname','goodsdescriptation'];

    public function classunit()
    {
        return $this->belongsTo('NeverTest\Classunit','class_id','id');
    }
    public function student()
    {
        return $this->belongsTo('NeverTest\User','student_id','id');
    }
    public function consultant()
    {
        return $this->belongsTo('NeverTest\Consultant','consultant_id','id');
    }
}
