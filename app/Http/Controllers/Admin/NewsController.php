<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index ()
    {
        $news = News::all();
        return view('dashboard.news')
        ->with('News',$news);

    }

    public function save (Request $request)
    {
        $news = new News;

        $news->title = $request->input('title');
        $news->content = $request->input('content');
   
        $news->save();

        
        return redirect('/customer/my-tickets')->with('status','Saved');
    }

    public function edit ($id)
    {
        $news = News::findorFail($id);
       
        return view('dashboard.news-edit')
             ->with('News',$news);
        //->with('News',$news);
    }
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');

        $news->update();

        return redirect('news')->with('status','Annonce mise à jour');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect('news')->with('status','Annonce supprimée');
    }
}
