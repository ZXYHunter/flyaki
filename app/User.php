<?php

namespace NeverTest;

use NeverTest\Consultant;
use NeverTest\Tag;
use NeverTest\Apns_devices;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['certification','token','username','name', 'checkcode','email', 'password', 'gender', 'email', 'photoaddr', 'phone', 'qq', 'introduction', 'signature', 'university', 'major', 'degree'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function tag(){
        return $this->hasManyThrough('NeverTest\Tag', 'NeverTest\Consultant');
        //return $this->consultant()->tag();
    }

    public function consultant(){
        return $this->hasOne('NeverTest\Consultant','user_id','id');
    }

    public function bookedClass(){
        return $this->hasMany('NeverTest\Classunit','student_id','id');
    }

    public function deviceToken(){
        return $this->hasOne('NeverTest\Apns_devices','user_id','id');
    }

}
