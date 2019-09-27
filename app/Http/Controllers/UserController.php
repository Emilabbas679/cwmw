<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('test');

    }


    public function index()
    {
        $users = User::orderby('status','desc')->Paginate(10);
        return view('admin.users.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'surname' => "required",
            'phone' => "required",
            'email'=> 'required',
            'status'=>'required',
            'password'=> 'required',
            'confirm_password' => 'required'
        ]);
        $email = User::where("email",$request->input('email'))->get();
        $auth = User::find(Auth::id());
        if(isset($email[0]['id'])) {
            return redirect()->back()->withInput()->with('error',trans('admin.email_or_phone_used'));

        }
        else {
            if ($request->password == $request->confirm_password) {
                if($request->status >= $auth->status) {
                    return redirect()->back()->withInput()->with('error',trans('admin.not_allow'));
                }
                else {
                    $user = new User();
                    $user->name = $request->input('name');
                    $user->surname = $request->input('surname');
                    $user->phone = $request->input('phone');
                    $user->email = $request->input('email');

                    $user->status = $request->input('status');
                    $user->password = password_hash($request->input('password'), PASSWORD_DEFAULT);
                    $user->save();

                    return redirect('/admin/users')->with("success", trans('admin.user_added'));
                }
            }
            else{
                return redirect()->back()->withInput()->with('error',trans('admin.passwords_dont_match'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->with(['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $options = [1=>"Admin",2=>'Admin+'];

        if(Auth::user()->status > $user->status){
            return view('admin.users.edit')->with([
                'user'=>$user,
                'options' => $options,
            ]);
        }
        else {
            return redirect('admin/users')->with('error',trans('admin.not_allow'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status'=>'required',
        ]);



        $user = User::find($id);
        if($request->input('status')>= Auth::user()->status) {
            return redirect("admin/users/$user->id/edit")->with('error',trans('admin.not_allow'));
        }


        $user->status = $request->input('status');
        $user->save();

        return redirect("/admin/users/$user->id")->with("success",trans('admin.succesfully_changed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(Auth::user()->status > $user->status) {
            $user->delete();
            return redirect('/admin/users')->with("success",trans('admin.deleted'));
        }
        else{
            return redirect(url()->previous())->with('error',trans('admin.not_allow'));
        }

    }


    public function changepass(Request $request)
    {
        $this->validate($request,[
            'password'=>'required',
            'curr_password'=>'required',
            'confirm_password'=>'required',
        ]);
        $user = User::find(Auth::id());

        if(password_verify($request->curr_password,$user->password)) {
            if($request->password == $request->confirm_password) {
                $user->password = password_hash($request->password,PASSWORD_DEFAULT);
                $user->save();
                return redirect('/admin/profile')->with('success','Password successfully changed');
            }
            else{
                return redirect()->back()->withInput()->with('error',trans('admin.passwords_dont_match'));

            }
        }
        else {
            return redirect()->back()->withInput()->with('error',trans('admin.currentpass_false'));
        }
    }
}
