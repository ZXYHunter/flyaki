<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    //
    protected $table = 'agency';

    protected $fillable = ['num','certification', 'apply_assistance','international_project','language_training','company_name','location', 'brief_intro', 'detailed_intro', 'price', 'is_online','discount_info','phone','company_photoaddr','star'];

    public function comments()
    {
        return $this->hasMany('NeverTest\Comments','agency_id','id');
    }

}
