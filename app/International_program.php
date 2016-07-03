<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;

class International_program extends Model
{
    //
    protected $table = 'international_program';

    protected $fillable = ['program_name','english_name','brief_intro', 'background', 'price_include', 'price_exclude', 'transport_info','accomdation_info','schedule','benefit','requirement','signup_way','notice','due','rating','min_price','max_price','nation','contact','website','phone','photo_addr_1','photo_addr_2','photo_addr_3','star','key'];

    public function consultant(){
        return $this->hasOne('NeverTest\Consultant','user_id','id');
    }
}
