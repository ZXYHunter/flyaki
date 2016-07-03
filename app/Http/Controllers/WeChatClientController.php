<?php

namespace NeverTest\Http\Controllers;
use NeverTest\Professor;
use NeverTest\User;
use NeverTest\Consultant;
use NeverTest\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class WeChatClientController extends Controller {


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
        $userinfo['tag'] = $userinfo['consultant']->tag;
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
                if($this->getConsultantInfo($id)['consultant']['certification']=='passed'&& $this->getConsultantInfo($id)['photoaddr']!='user/photo/default.jpg')
                    $allConsultantUsers [] = $this->getConsultantInfo($id);
            }
        }
        $allConsultantUsers = Consultant::where('consultant.certification', '=', 'passed')->join('users', 'consultant.user_id', '=', 'users.id')->orderBy('photoaddr', 'desc')->paginate(4);
        $data = ['consultants'=>$allConsultantUsers,'title'=>'留学GO | 留学购商城'];
        return view('wechatdisplay',$data);
    }
    public  function getProfessorDisplay()
    {
        $allProfessors = Professor::all();
        $data = ['professors'=>$allProfessors,'title'=>'留学GO | 留学购商城'];
        return view('wechatProfessorDisplay',$data);
    }
    //顾问搜索界面
    public function getWechatSearchConsultant(){
        $consultants= Consultant::has('tag')->get();
        return view('wechatSearchConsultant',['title'=>'留学GO | 顾问搜索','consultants'=>$consultants]);
    }


}