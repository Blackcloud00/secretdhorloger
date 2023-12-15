<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactFormRequest;

class AjaxController extends Controller
{
    public function contactsave(ContactFormRequest $request) {

   /* $validationdata = $request->validate([
        'name'=>'required|string|min:2',
        'email'=>'required|email',
        'subject'=>'required',
        'message'=>'required'
    ],[
        'name.required' => 'rsg_002',
        'name.string' => 'rsg_003',
        'name.min' => 'rsg_004',
        'email.required' => 'rsg_005',
        'email.email' => 'rsg_006',
        'subject.required' => 'rsg_007',
        'message.required' => 'rsg_008',
    ]);*/

    /* $data = $request->all();
     $data["ip"] = $request->ip(); */

    $newdata =[
        'name' => Str::title($request->name),
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'ip' => request()->ip(),
    ];

     $lastSaveContact = Contact::create($newdata);

     Mail::to('demo@gmail.com')->send(new ContactMail($newdata));

     return back()->with(['message_key'=>'rsg_001']);

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
