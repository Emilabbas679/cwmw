<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Lang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;


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


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
        ]);
        if($request->hasFile('img')) {
            $fileNameToDb = '';
            foreach ($request->img as $file) {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $fileNameToStore = $fileName."_".time().".".$ext;
                $fileNameToDb .= $fileNameToStore.' ';
                Image::load($file)->save('uploads/gallery/'.$fileNameToStore);

            }
            $fileNameToDb = rtrim($fileNameToDb,' ');
        }
        else{
            $fileNameToDb='';
        }
        $gallery = new Gallery();
        $gallery->title = $request->title;
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
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request,[
            'title'=>'required',

        ]);

        if($request->hasFile('img')) {
            $fileNameToDb = '';
            foreach ($request->img as $file) {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $fileNameToStore = $fileName."_".time().".".$ext;
                $fileNameToDb .= $fileNameToStore.' ';
                Image::load($file)->save('uploads/gallery/'.$fileNameToStore);
            }
            if($gallery->img !== '') {
                $images = explode(' ' , $gallery->img);
                foreach ($images as $img) {
                    if(is_file("uploads/gallery/".$img)) {
                        unlink("uploads/gallery/".$img);
                    }
                }
            }
            $fileNameToDb = rtrim($fileNameToDb,' ');
            $gallery->img = $fileNameToDb;

        }
        $gallery->title = $request->title;
        if($gallery->save()) {
            return redirect("/admin/gallery/$gallery->id")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/gallery/$gallery->id/edit")->with('error',trans('admin.didnot_change'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if($gallery->img !== '') {
            $images = explode(' ' , $gallery->img);
            foreach ($images as $img) {
                if(is_file("uploads/gallery/".$img)) {
                    unlink("uploads/gallery/".$img);
                }
//                Storage::delete('public/gallery/' . $img);
            }
        }
        $gallery->delete();
        return redirect('/admin/gallery')->with("success",trans('admin.deleted'));
    }
}
