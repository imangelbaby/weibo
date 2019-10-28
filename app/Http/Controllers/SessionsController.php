<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionsController extends Controller
{
	public function __construct(){
		//用于指定一些只允许未登录用户访问的动作
		$this->middleware('guest', [
            'only' => ['create']
        ]);
	}
    
    //显示登录页面
    public function create(){
    	return view('sessions.create');
    }
    //提交登录
    public function store(Request $request){
    	$credentials = $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       	]);
    	if(Auth::attempt($credentials,$request->has('remember'))){
    		if(Auth::user()->activated){
    			session()->flash('success', '欢迎回来！');
		    	$fallback = route('users.show', Auth::user());
		    	return redirect()->intended($fallback); //将页面重定向到上一次请求尝试访问的页面上
    		}else{
    			Auth::logout();
               session()->flash('warning', '你的账号未激活，请检查邮箱中的注册邮件进行激活。');
               return redirect('/');
    		}
	    	
	        //return redirect()->route('users.show', [Auth::user()]);
    	}else{
    		session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
	        return redirect()->back()->withInput();
    	}

    	return;
    }
    //退出登录
    public function destroy(){
    	Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}