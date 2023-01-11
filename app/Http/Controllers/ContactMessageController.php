<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactMessageController extends Controller
{
    public function index(){
        $verifiedUser = Auth::user();
        return view('home.contact',compact('verifiedUser'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        Mail::to('m.ragab.elashmoney@gmail.com')->send(new ContactMail($data));
        Alert::success('Your Email has been sent','We will be contact with you soon');
        return redirect()->back();
    }
}
