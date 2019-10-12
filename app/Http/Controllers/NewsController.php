<?php

namespace App\Http\Controllers;


use App\Lang;
use App\Locale;
use App\News;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Sluggable\SlugOptions;


class NewsController extends Controller
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

        $news =News::orderBy('id','desc')->Paginate(20);
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = Lang::all();
        return view('admin.news.create')->with('locale',$locale);
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
            'text'=> 'required',
            'img' => 'image|nullable|max:1999'

        ]);

        if($request->hasFile('img')) {
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $fileName."_".time().".".$ext;
            Image::load($request->file('img'))->save('uploads/news/'.$fileNameToStore);
        }
        else{
            $fileNameToStore= '';
        }

        $arr_slug = [];
        $title = $request->title;
        foreach ($title as $key =>$value) {
            $value = mb_strtolower(str_replace(' ','-',$value));
            $arr_slug[$key] = $value;
        }

        $news = new News();
        $news->slug = $arr_slug;
        $news->user_id = Auth::id();
        $news->text = $request->text;
        $news->title = $request->title;
        $news->img = $fileNameToStore;

        if($news->save()){
            return redirect('/admin/news')->with('success',trans('admin.saved'));
        }
        else{
            return redirect('/admin/news/create')->with('error',trans('didnot_save'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view("admin.news.show")->with("news",$news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $locale =Lang::all();
        return view("admin.news.edit")->with([
            "news"=>$news,
            'locale' => $locale
        ]);
    }


    public function update(Request $request, News $news)
    {
        $this->validate($request,[
            'title'=>'required',
            'text'=> 'required',
        ]);
        if($request->hasFile('img')) {
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $fileName."_".time().".".$ext;
            Image::load($request->file('img'))->save('uploads/news/'.$fileNameToStore);
        }
        $arr_slug = [];
        $slug = $request->slug;
        foreach ($slug as $key => $value) {
            $value = mb_strtolower(str_replace(' ','-',$value));
            $arr_slug[$key] = $value;
        }

        $news->title = $request->title;
        $news->text = $request->text;
        $news->slug = $arr_slug;
        if($request->hasFile('img')) {
                if(is_file('uploads/news/'.$news->img)){
                    unlink('uploads/news/'.$news->img);
                }
            $news->img = $fileNameToStore;
        }
        if($news->save()) {
            return redirect("/admin/news/$news->id")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/news/$news->id/edit")->with('error',trans('admin.didnot_change'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (is_file("uploads/news/".$news->img)) {
            unlink("uploads/news/".$news->img);
        }
        $news->delete();
        return redirect('/admin/news')->with("success",trans('admin.deleted'));
    }
}
