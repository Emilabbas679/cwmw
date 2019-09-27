<?php

namespace App\Http\Controllers;

use App\Messages;
use App\News;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{



    public function __construct()
    {
        $this->middleware('test');
    }


    public function profile()
    {
        $user = User::find(Auth::id());
        return view('admin.profile')->with('user',$user);
    }


    public function locale(Request $request)
    {
        Session::put(['locale' => $request->local]);
        App::setLocale(Session::get('locale'));

    }

    public function index() {
        $users = User::orderby('id','desc')->Paginate(5);
        $news = News::orderby("id",'desc')->Paginate(5);
        $messages = Messages::orderby('id','desc')->Paginate(5);
        return view('admin.index')->with([
            'users' => $users,
            'news'=>$news,
            'msgs' => $messages
        ]);
    }






}