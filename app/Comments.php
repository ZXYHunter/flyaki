<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $table = 'comments';

    protected $fillable = ['agency_id', 'user_id', 'content', 'created_at', 'updated_at', 'price','country','star','certification'];
    public function user()
    {
        return $this->belongsTo('NeverTest\User','user_id','id');
    }
    public function agency()
    {
        return $this->belongsTo('NeverTest\Agency','agency_id','id');
    }
}
