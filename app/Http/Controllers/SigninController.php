<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller{
    public function signin(){
        //获取用户名密码
        $username = Request::get('username');
        $password = Request::get('password');
        //检查用户名密码是否为空
        if(!($username && $password)){
            return ['status'=>0,'message'=>'用户或密码为空'];
        }
        //数据库获取数据
        $user = new User();
        $res = $user->where('name',$username)->first();
        if($res){
            //检查密码
            if(!(Hash::check($password,$res->password))){
                return ['status'=>0,'message'=>'密码错误'];
            }
        }else {
            return ['status'=>0,'message'=>'用户名不存在'];
        }
        return ['status'=>1,'message'=>'successfully'];
    }
}