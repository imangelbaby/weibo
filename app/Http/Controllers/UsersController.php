<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{

    public function index(){
        return view('users.index');
    }
    /**
     * 注册
     * @return [type] [description]
     */
    public function create(){
    	return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    
}
