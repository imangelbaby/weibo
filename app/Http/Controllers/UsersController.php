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

    public function store(Request $request){
        $this->validate([
            'name'=>'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
        var_dump($request);
    }


}
