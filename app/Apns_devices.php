<?php

namespace NeverTest;

use Illuminate\Database\Eloquent\Model;
use NeverTest\User;
use NeverTest\Classunit;

class Apns_devices extends Model
{
    //
    protected $table = 'apns_devices';

    protected $fillable = ['user_id','appname','appversion', 'devicetoken', 'devicename', 'devicemodel', 'deviceversion','status','created_at'];


}
