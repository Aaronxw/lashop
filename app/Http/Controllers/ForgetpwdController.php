<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class ForgetpwdController extends Controller{
    public function forgetemail(){
        $email = Request::get('email');
        if(!$email){
            return ['status'=>0,'message'=>'Email为空'];
        }
        
    }
    
    public function forgetphone(){
        $phone = Request::get('phone');
        if(!$phone){
            return ['status'=>0,'message'=>'电话号码为空'];
        }
        
    }
}
