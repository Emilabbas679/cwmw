<?php

namespace App\Http\Controllers;

use App\About;
use App\Departments;
use App\Gallery;
use App\Messages;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Jenssegers\Date\Date;

class SiteController extends Controller
{


    public function locale(Request $request)
    {
        Session::put(['locale' => $request->local]);
        App::setLocale(Session::get('locale'));

    }

    public function index()
    {
        $recent_news = News::orderby("id",'desc')->paginate(1);
        $latest_news = News::orderby("id",'desc')->paginate(3);
        unset($latest_news[0]);
        $most_news = News::orderby('view','desc')->paginate(3);
        $images = Gallery::orderby('id','desc')->paginate(3);
        return view('site.index')->with([
            'recent_news' => $recent_news,
            'latest_news' => $latest_news,
            'most_news' => $most_news,
            'images' => $images,
        ]);
    }

    public function about()
    {
        $about = About::find(1);
        return view('site.about')->with([
            'about' => $about,
        ]);
    }


    public function contact()
    {

        $recent = News::orderby('id','desc')->paginate(3);
        return view('site.contact')->with([
        'recent' => $recent
        ]);
    }

    public function gallery()
    {

        $images = Gallery::orderby('id','desc')->paginate(20);
        return view('site.gallery')->with([
            'images' => $images,
        ]);
    }


    public function blog()
    {

        $news = News::orderby('id','desc')->paginate(30);
        return view('site.blog')->with([
        'news' => $news,
        ]);
    }

    public function projects()
    {

        return view('site.projects')->with([

        ]);
    }

    public function departments()
    {

        $departments = Departments::find(1);
        return view('site.departments')->with([
            'departments' => $departments
        ]);
    }

    public function blogPost(Request $request)
    {
       $lang = App::getLocale();
//        $news = News::where("slug",'like','%'.$request->slug.'%')->get();

        $news = News::find($request->id);
        $recent = News::orderby('created_at','desc')->paginate(2);
        if(isset($news->id)) {

//                $news = $news[0];
                $update = News::find($news->id);
                $update->view = $update->view+1;
                $update->save();

                if($recent[0]->id == $news->id) {
                    unset($recent[0]);
                    $recent = $recent[1];
                }
                else {
                    unset($recent[1]);
                    $recent = $recent[0];

                }

            return view('site.blog-post')->with([
                'news' => $news,
                'recent' => $recent,
            ]);
        }
        else {
            return redirect('/error');
        }




    }

    public function error()
    {
        return view('site.404');
    }

    public function search(Request $request)
    {

        $titles = News::where("title",'like','%'.$request->search.'%')->get();
        return view('site.search')->with([
            'titles' => $titles,
        ]);
    }


    public function message(Request $request)
    {
        $message = new Messages();
        $message -> name = $request->name;
        $message->surname = $request->surname;
        $message->email = $request->email;
        $message->text = $request->message;
        if($message->save()) {
            return redirect('/contact')->with('success',trans('admin.msg_sent'));
        }
        else {
            return redirect()->back()->withInput()->with('error','Error');
        }
    }

}
