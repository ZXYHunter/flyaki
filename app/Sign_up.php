<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;
use NeverTest\User;
use NeverTest\International_program;

class Sign_up extends Model
{
    //
    protected $table = 'sign_up';

    protected $fillable = ['user_id','type','foreign_id', 'name', 'school', 'major', 'grade','phone','email','created_at'];

    public function user()
    {
        return $this->belongsTo('NeverTest\User','user_id','id');
    }
    public function international_program()
    {
        return $this->belongsTo('NeverTest\International_program','foreign_id','id');
    }
}
