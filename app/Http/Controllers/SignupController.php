<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller{
    public function index(){
        return ['status'=>1,'message'=>'hello signup'];
    }
    
    public function signup(){
        //dd(Request::all());
        $username = Request::get('username');
        $password = Request::get('password');
        $email = Request::get('email');
        $phone = Request::get('phone');
        
        if(!($username && $password)){
            return ['statue'=>0,'message'=>'用户名或密码为空'];
        }
        
        $user = new User();
        $exists = $user->where('name',$username)->exists();
        if($exists){
            return ['status'=>0,'message'=>'用户名已存在'];
        }
        
        $exists = $user->where('email',$email)->exists();
        if($exists){
            return ['status'=>0,'message'=>'该电子邮箱已注册已存在'];
        }
        
        $exists = $user->where('phone',$phone)->exists();
        if($exists){
            return ['status'=>0,'message'=>'该电话号码已存在'];
        }
        
        $hash_password = Hash::make($password);
        
        $user->name = $username;
        $user->password = $hash_password;
        $user->email = $email;
        $user->phone = $phone;
        if($user->save()){
            return ['status'=>1,'message'=>'注册成功'];
        }else {
            return ['status'=>0,'message'=>'数据库写入失败'];
        }
    }
}
