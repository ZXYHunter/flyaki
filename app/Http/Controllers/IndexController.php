<?php

namespace NeverTest\Http\Controllers;
use NeverTest\User;
use NeverTest\Consultant;
use NeverTest\Tag;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller {


    protected function  getConsultantInfo($userid)
    {
        $userinfo = [
            'id' => $userid,
            'username' => User::where('id', $userid)->pluck('username'),
            'name' => User::where('id', $userid)->pluck('name'),
            'email' => User::find($userid)->email ,
            'phone' => User::where('id', $userid)->pluck('phone'),
            'gender' => User::where('id', $userid)->pluck('gender'),
            'photoaddr' => User::where('id', $userid)->pluck('photoaddr'),
            'qq' => User::where('id', $userid)->pluck('qq'),
            'introduction' => User::where('id', $userid)->pluck('introduction'),
            'signature' => User::where('id', $userid)->pluck('signature'),
            'university' => User::where('id', $userid)->pluck('university'),
            'major' => User::where('id', $userid)->pluck('major'),
            'degree' => User::where('id', $userid)->pluck('degree'),
            'consultant' => User::find($userid)->consultant
        ];
        $userinfo['services'] = $userinfo['consultant']->services;
        return $userinfo;
    }

    public function getDisplayAll()
    {
        $allConsultantUsersRaw = User::has('consultant')->get();
        $allConsultantUsers = [];
        foreach($allConsultantUsersRaw as $key=>$consultant)
        {
            $id = $allConsultantUsersRaw[$key]->id;
            if($this->getConsultantInfo($id)['consultant']) {
                if($id==85||$id==119||$id==117||$id==91)
                    $allConsultantUsers [] = $this->getConsultantInfo($id);
            }
        }
        $data = ['consultants'=>$allConsultantUsers,'title'=>'留学Go | 去中介化 零抽成 开创留学新方式'];
        return view('index',$data);
    }

    public function getDisplayAllforQQ(){
        $allConsultantUsersRaw = User::has('consultant')->get();
        $allConsultantUsers = [];
        foreach($allConsultantUsersRaw as $key=>$consultant)
        {
            $id = $allConsultantUsersRaw[$key]->id;
            if($this->getConsultantInfo($id)['consultant']) {
                if($id==85||$id==119||$id==117||$id==91)
                    $allConsultantUsers [] = $this->getConsultantInfo($id);
            }
        }
        $data = ['consultants'=>$allConsultantUsers,'title'=>'留学Go | 去中介化 零抽成 开创留学新方式'];
        return view('indexforQQ',$data);
    }

}