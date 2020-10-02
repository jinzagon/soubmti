<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    function index()
    {
        return view ('dashboard.sendemail');
    }

    function send(Request $request)
    {
        $this->validate($request,[
            'name'  =>  'required',
            'email' =>  'required|email',
            'message' =>  'required'
        ]);
        $data = array(
            'name' => $request->name,
            'message' => $request->message,
        );
        Mail::to('admin@supmti.ma')->send(new SendMail($data));
        return back()->with('success','Votre message a été envoyé avec succès à un Admin de SUPMTI');
    }
}
