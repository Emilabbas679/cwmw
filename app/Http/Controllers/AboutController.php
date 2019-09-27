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


    public function edit($id)
    {
        $about= About::find($id);
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

        $locale = Lang::all();
        $this->validate($request,[
            'about'=>'required',

        ]);

        $arr_about = [];
        $title = $request->about;
        foreach ($title as $key =>$value) {
            array_push($arr_about, $value);
        }
        $array2 = [];
        foreach ($locale as $lockey => $local) {
            array_push($array2,$local->lang);
        }

        $keys = array_values($array2);
        $about = array_combine($keys, array_values($arr_about));
        $update = About::find($id);
        $update->about = $about;

        if($update->save()) {
            return redirect("/admin/about")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/about/$id/edit")->with('error',trans('admin.didnot_change'));
        }
    }
}
