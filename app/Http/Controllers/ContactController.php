<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function HomeContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        Contact::insert([
          'address' => $request->address,
          'email'  => $request->email,
          'phone'  => $request->phone
        ]);

        return Redirect()->route('home.contact')->with('Contact
        Information Insert Successfull');
    }

    public function EditContact($id){

      $contacts = Contact::find($id);
      return view('admin.contact.edit',compact('contacts'));
    }

    public function UpdateContact(Request $request,$id){

          Contact::find($id)->update([
          'address' => $request->address,
          'email'  => $request->email,
          'phone'  => $request->phone
          ]);
          return Redirect()->route('home.contact')->with('Contact
        Information Update Successfull');
    }


    // font page show
    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('layouts.pages.contact',compact('contacts'));
    }


    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email'  => $request->email,
            'subject'  => $request->subject,
            'message'  => $request->message,
            'created_at' => Carbon::now()
        ]);
      return Redirect()->route('contact')->with('success',
      'Contact Insert Successsfull');

    }

    public function ContactFormAdmin(){
        $contactforms = ContactForm::all();
        return view('admin.contactmessage.index',compact('contactforms'));
    }

    public function Mdelete($id){
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success','Message Delete Successfully');
    }
}
