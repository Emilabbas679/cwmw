<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
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
        $messages = Messages::orderby("id",'desc')->Paginate(10);
        return view('admin.message.index')->with('messages',$messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
           'name' => 'required',
           'surname' => 'required',
           'email' => 'required',
            'text' => 'required',
        ]);
        $messages = new Messages();
        $messages->name = $request->name;
        $messages->surname = $request->surname;
        $messages->email = $request->email;
        $messages->text = $request->text;
        if($messages->save()){
            return 'true';
        }
        else {
            return redirect()->back()->withInput()->with('error',' Could not send');
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
        $message = Messages::find($id);
        return view('admin.message.show')->with('message',$message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $message =Messages::find($request->id);


        $message->read = 1;
        if($message->save()) {
            return true;
        }
        else {
            return false;
        }
    }
    public function updateall()
    {
        $affected = DB::table('messages')->update(array('read' => 1));
        if($affected) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Messages::find($id);
        if($message->delete()){
            return redirect('admin/message')->with('success',trans('admin.deleted'));
        }
        else {
            return redirect()->back()->withInput()->with('error',trans('admin.didnot_delete'));
        }
    }
}
