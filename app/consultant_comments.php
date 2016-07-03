<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class consultant_comments extends Model
{

    protected $table = 'consultant_comments';

    protected $fillable = ['consultant_id', 'user_id', 'content', 'created_at', 'updated_at', 'certification','star'];
    public function user()
    {
        return $this->belongsTo('NeverTest\User','user_id','id');
    }
    public function consultant()
    {
        return $this->belongsTo('NeverTest\Consultant','consultant_id','id');
    }
}
