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
            $request->file('img')->storeAs('public/news',$fileNameToStore);
        }
        else{
            $fileNameToStore= '';
        }
        $locale = Lang::all();

        $arr_slug = [];
        $title = $request->title;
        foreach ($title as $key =>$value) {
            $value = mb_strtolower(str_replace(' ','-',$value));
            array_push($arr_slug, $value);
        }

        $title = $request->title;


        $array2 = [];
        foreach ($locale as $lockey => $local) {
            array_push($array2,$local->lang);
        };
        $keys = array_values($array2);
        $title = array_combine($keys, array_values($request->title));
        $slug = array_combine($keys, array_values($arr_slug));
        $text = array_combine($keys, array_values($request->text));
        $news = new News();
        $news->slug = $slug;
        $news->user_id = Auth::id();
        $news->text = $text;
        $news->title = $title;
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
    public function show($id)
    {
        $news = News::find($id);
        return view("admin.news.show")->with("news",$news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locale =Lang::all();
        $news = News::find($id);
        return view("admin.news.edit")->with([
            "news"=>$news,
            'locale' => $locale
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
            'text'=> 'required',
        ]);


        if($request->hasFile('img')) {
            $fileNameWithExt = $request->file('img')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $fileName."_".time().".".$ext;
            $request->file('img')->storeAs('public/news',$fileNameToStore);
        }


        $arr_slug = [];
        $slug = $request->slug;
        foreach ($slug as $key => $value) {
            $value = mb_strtolower(str_replace(' ','-',$value));
            array_push($arr_slug, $value);
        }


        $array2 = [];
        foreach ($locale as $lockey => $local) {
            array_push($array2,$local->lang);
        }
        $keys = array_values($array2);
        $title = array_combine($keys, array_values($request->title));
        $slug = array_combine($keys, array_values($arr_slug));
        $text = array_combine($keys, array_values($request->text));

        $news = News::find($id);
        $news->title = $title;
        $news->text = $text;
        $news->slug = $slug;
        if($request->hasFile('img')) {
            if($news->img !== '') {
                Storage::delete('public/news/' . $news->img);
            }
            $news->img = $fileNameToStore;
        }
        if($news->save()) {
            return redirect("/admin/news/$id")->with('success',trans('admin.succesfully_changed'));
        }
        else {
            return redirect("/admin/news/$id/edit")->with('error',trans('admin.didnot_change'));
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
        $news = News::find($id);
        if($news->img !=='') {
            Storage::delete('public/news/'.$news->img);
        }
        $news->delete();
        return redirect('/admin/news')->with("success",trans('admin.deleted'));
    }
}
