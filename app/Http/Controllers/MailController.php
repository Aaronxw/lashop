<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{
    public function send(){
        $code = Request::get('code');
        
        $name = 'Aaron';
        $flag = Mail::send('emails.test',['name'=>$name,'code'=>$code],function($message){
            $to = '313728089@qq.com';
            $message ->to($to)->subject('邮件测试');
        });
        if(!$flag){
            return ['status'=>1,'message'=>'发送邮件成功,请注意查收!','code'=>$code];
        }else{
            return ['status'=>0,'message'=>'发送邮件失败,请重试!'];
        }
    }
}
