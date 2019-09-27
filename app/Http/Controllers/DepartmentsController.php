<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Lang;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
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
        $departments = Departments::find(1);
        return view('admin.departments.index')->with('departments',$departments);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Departments::find($id);
        $locale = Lang::all();
        return view('admin.departments.edit')->with([
            'departments'=> $departments,
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
            'departments'=>'required',

        ]);

        $arr_departments = [];
        $title = $request->departments;
        foreach ($title as $key =>$value) {
            array_push($arr_departments, $value);
        }
        $array2 = [];
        foreach ($locale as $lockey => $local) {
            array_push($array2,$local->lang);
        }

        $keys = array_values($array2);
        $departments = array_combine($keys, array_values($arr_departments));
        $update = Departments::find($id);
        $update->departments = $departments;

        if($update->save()) {
            return redirect("/admin/departments")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/departments/$id/edit")->with('error',trans('admin.didnot_change'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
