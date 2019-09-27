<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Lang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
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
        $images = Gallery::orderby("id","desc")->Paginate(10);
        return view("admin.gallery.index")->with([
           'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = Lang::all();
        return view('admin.gallery.create')->with('locale',$locale);
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
            'title'=>'required',
//            'img' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('img')) {
            $fileNameToDb = '';
            foreach ($request->img as $file) {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $fileNameToStore = $fileName."_".time().".".$ext;
                $fileNameToDb .= $fileNameToStore.' ';
                $file->storeAs('public/gallery',$fileNameToStore);
            }
            $fileNameToDb = rtrim($fileNameToDb,' ');

        }

//        $fileNameWithExt = $request->file('img')->getClientOriginalName();
//        $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//        $ext = $request->file('img')->getClientOriginalExtension();
//        $fileNameToStore = $fileName."_".time().".".$ext;
//        $request->file('img')->storeAs('public/gallery',$fileNameToStore);

        $locale = Lang::all();
        $arr_title = [];
        $title = $request->title;
        foreach ($title as $key =>$value) {
            array_push($arr_title, $value);
        }
        $array2 = [];
        foreach ($locale as $lockey => $local) {
            array_push($array2,$local->lang);
        }
        $keys = array_values($array2);
        $title = array_combine($keys, array_values($arr_title));
        $gallery = new Gallery();
        $gallery->title = $title;
        $gallery->img = $fileNameToDb;
        if($gallery->save()){
            return redirect('/admin/gallery')->with('success',trans('admin.saved'));
        }
        else{
            return redirect('/admin/gallery/create')->with('error','admin.didnot_save');
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
        $image = Gallery::find($id);
        return view('admin.gallery.show')->with('image',$image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Gallery::find($id);
        $locale = Lang::all();
        return view('admin.gallery.edit')->with([
            'image' => $image,
            'locale'=> $locale,
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
            'title'=>'required',

        ]);

//        if($request->hasFile('img')) {
//            $fileNameWithExt = $request->file('img')->getClientOriginalName();
//            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
//            $ext = $request->file('img')->getClientOriginalExtension();
//            $fileNameToStore = $fileName."_".time().".".$ext;
//            $request->file('img')->storeAs('public/gallery',$fileNameToStore);
//        }


        if($request->hasFile('img')) {
            $fileNameToDb = '';
            foreach ($request->img as $file) {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $fileNameToStore = $fileName."_".time().".".$ext;
                $fileNameToDb .= $fileNameToStore.' ';
                $file->storeAs('public/gallery',$fileNameToStore);
            }
            $fileNameToDb = rtrim($fileNameToDb,' ');

        }

        $arr_title = [];
        $title = $request->title;
        foreach ($title as $key =>$value) {
            array_push($arr_title, $value);
        }

        $array2 = [];
        foreach ($locale as $lockey => $local) {
            array_push($array2,$local->lang);
        }
        $keys = array_values($array2);
        $title = array_combine($keys, array_values($arr_title));

        $gallery = Gallery::find($id);
        $gallery->title = $title;

        if($request->hasFile('img')) {
            if($gallery->img !== '') {
                $images = explode(' ' , $gallery->img);
                foreach ($images as $img) {
                    Storage::delete('public/gallery/' . $img);
                }
            }
            $gallery->img = $fileNameToDb;
        }
        if($gallery->save()) {
            return redirect("/admin/gallery/$id")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/gallery/$id/edit")->with('error',trans('admin.didnot_change'));
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
        $gallery = Gallery::find($id);
        if($gallery->img !== '') {
            $images = explode(' ' , $gallery->img);
            foreach ($images as $img) {
                Storage::delete('public/gallery/' . $img);
            }
        }
        $gallery->delete();
        return redirect('/admin/gallery')->with("success",trans('admin.deleted'));
    }
}
