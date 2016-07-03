<?php

namespace NeverTest\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Mockery\CountValidator\Exception;
use NeverTest\Messagebox;
use NeverTest\User;
use Illuminate\Support\Facades\Mail;

class MessageboxController extends Controller {

    public function postMessagebox()
    {
        if(!Auth::check()) {
            Session::put('message',["You haven't Login!"]);
            return "unauthorized!";
        }
        $messages = [];
        if(Request::input('type') == 'received')
        {
            $messages = Messagebox::where('receiver' ,'=', Auth::user()->getAuthIdentifier())->get();
        }
        else
        {
            $messages = Messagebox::where('sender' ,'=', Auth::user()->getAuthIdentifier())->get();
        }
        foreach($messages as $message)
        {
            $message['plaintext'] = ['received'=>['来自','的私信'],'send'=>['发给','的私信']];
            //$message['plaintext']['received'] = array('来自','的私信');
            //$message['plaintext']['send'] = array('发给','的私信');
            $id = $message['sender'];
            $message['sender'] = ['id'=>$id,'name'=>User::where('id','=',$id)->pluck('name')];
            $id = $message['receiver'];
            $message['receiver'] = ['id'=>$id,'name'=>User::where('id','=',$id)->pluck('name')];
        }
        return response()->json($messages);
    }

    public function sendMessagebox()
    {
        if (!Auth::check()) {
            Session::put('message', ["You haven't Login!"]);
            return "unauthorized!";
        }
        $receiver = User::where('name','=', Request::input('receiver'))->pluck('id');
        if(empty($receiver)) goto failed;
        $message = [
            'sender' => Auth::user()->getAuthIdentifier(),
            'receiver' => $receiver,
            'title' => Request::input('title'),
            'content' => Request::input('content')
        ];
        $data=['email'=>User::where('name','=', Request::input('receiver'))->pluck('email'),'name' => Request::input('receiver')];
        Mail::send('email.newMessage',['receiverName' => Request::input('receiver'),'senderName'=>User::where('id','=',Auth::user()->getAuthIdentifier())->pluck('username'),'title'=>Request::input('title')],function($message) use($data){
            $message->to($data['email'],$data['name'])->subject('留学Go|您收到一条新私信');
        });
        Messagebox::create($message);
        $messages = [];
        $message = ['type'=>'success','class'=>'alert-success','message'=>'私信发送成功'];
        $messages []= $message;
        return $messages;

        failed:
        $messages = [];
        $message = ['type'=>'fail','class'=>'alert-warning','message'=>'私信发送失败，请检查用户名是否正确'];
        $messages []= $message;
        return $messages;
    }

}