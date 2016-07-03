<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class consultant_money extends Model
{

    protected $table = 'consultant_money';

    protected $fillable = ['sender_name', 'receiver_user_id', 'sender_id', 'created_at', 'money'];

    public function receiver(){
        return $this->hasOne('NeverTest\User','id','receiver_user_id');
    }

}
