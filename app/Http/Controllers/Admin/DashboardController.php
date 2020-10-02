<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function registered()
     {
            $users = User::all();
            return view('dashboard.list')->with('users',$users);
     }

     public function registeredit(Request $request, $id)
     {
        $users = User::findOrFail($id);
        return view('dashboard.list-edit')->with('users',$users);
     }

     public function registerupdate(Request $request, $id)
     {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->annee = $request->input('annee');
        $users->filliere = $request->input('filliere');

        $users->m1 = $request->input('m1');
        $users->m1c1 = $request->input('m1c1');
        $users->m1c2 = $request->input('m1c2');
        $users->m1ef = $request->input('m1ef');

        $users->m2 = $request->input('m2');
        $users->m2c1 = $request->input('m2c1');
        $users->m2c2 = $request->input('m2c2');
        $users->m2ef = $request->input('m2ef');

        $users->m3 = $request->input('m3');
        $users->m3c1 = $request->input('m3c1');
        $users->m3c2 = $request->input('m3c2');
        $users->m3ef = $request->input('m3ef');



        $users->update();

        return redirect('/list')->with('status','Your data is updated');
    }

    public function registerdelete($id)
    {
       $users = User::findorFail($id);
       $users->delete();
       
       return redirect('/list')->with('status','Your data is deleted');
   }

   public function admin($id) {

      $user = User::find($id);

      $user->admin = 1;
      $user->save();

      return redirect('/list')->with('status','Les privilèges Admin ont été accordés.');
   }

   public function not_admin($id) {

      $user = User::find($id);

      $user->admin = 0;
      $user->save();

      return redirect('/list')->with('status','Les privilèges Admin ont été révoqués.');
   }
}
