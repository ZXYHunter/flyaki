<?php

namespace NeverTest;

use NeverTest\User;
use NeverTest\Tag;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model
{
    //
    protected $table = 'consultant';
    public $timestamps = false;
    protected $fillable = ['work_experience','get_offer','realname','skypeid','judgenum','star','certification','user_id', 'photoalbum_id','services','briedintroduction','experience','academy','strength','answer','relative'];
    public function tag()
    {
        return $this->hasOne('NeverTest\Tag');
    }

    public function classes()
    {
        return $this->hasMany('NeverTest\Classunit');
    }
    public function comments()
    {
        return $this->hasMany('NeverTest\consultant_comments','consultant_id','id');
    }
    public function teachClasses()
    {
        return $this->hasMany('NeverTest\Classunit','consultant_id','id');
    }
    public function user(){
        return $this->hasOne('NeverTest\User','id','user_id');
    }

}
