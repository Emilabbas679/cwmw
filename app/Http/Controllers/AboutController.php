<?php

namespace App\Http\Controllers;

use App\About;
use App\Departments;
use App\Lang;
use Illuminate\Http\Request;

class AboutController extends Controller
{


    public function __construct()
    {
        $this->middleware('test');

    }

    public function index()
    {
        $about = About::find(1);
        return view('admin.about.index')->with('about',$about);
    }


    public function edit(About $about)
    {
        $locale = Lang::all();
        return view('admin.about.edit')->with([
            'about'=> $about,
            'locale' =>$locale
        ]);
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
            'about'=>'required',

        ]);
        $update = About::find($id);
        $update->about = $request->about;
        if($update->save()) {
            return redirect("/admin/about")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/about/$id/edit")->with('error',trans('admin.didnot_change'));
        }
    }
}
