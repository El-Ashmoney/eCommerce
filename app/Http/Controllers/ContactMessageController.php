<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactMessageController extends Controller
{
    public function index(){
        return view('home.contact');
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
