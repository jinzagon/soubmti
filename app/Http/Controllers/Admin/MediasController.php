<?php

namespace App\Http\Controllers\Admin;

use App\Models\Medias;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediasController extends Controller
{
    public function index ()
    {
        $medias = Medias::all();
        return view('dashboard.medias')
        ->with('Medias',$medias);

    }

    public function save (Request $request)
    {
        $medias = new Medias;

        $medias->title = $request->input('title');
        $medias->author = $request->input('author');
        $medias->link = $request->input('link');
   
        $medias->save();

        
        return redirect('/medias')->with('status','Nouvel oeuvre ajoutée');
    }

    public function edit ($id)
    {
        $medias = Medias::findorFail($id);
       
        return view('dashboard.medias-edit')
             ->with('Medias',$medias);
    }
    public function update(Request $request, $id)
    {
        $medias = Medias::findOrFail($id);
        $medias->title = $request->input('title');
        $medias->content = $request->input('content');

        $medias->update();

        return redirect('medias')->with('status','Mise à jour effectuée');
    }

    public function delete($id)
    {
        $medias = Medias::findOrFail($id);
        $medias->delete();

        return redirect('medias')->with('status','Supression effectuée');
    }
}
