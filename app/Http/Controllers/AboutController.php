<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;

class AboutController extends Controller
{
    //
    public function HomeAbout(){
        $abouts = HomeAbout::all();
        return view('admin.about.index',compact('abouts'));
    }

    public function AddAbout(){
        return view('admin.about.create');
    }

    public function StoreAbout(Request $request){

        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis'  => $request->long_dis
        ]);

      return Redirect()->route('home.about')->with('success','About Inserted Successfully');

    }


      public function EditAbout($id){

          $abouts = HomeAbout::find($id);
          return view('admin.about.edit',compact('abouts'));

      }


       public function UpdateAbout(Request $request,$id){

        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis'  => $request->long_dis
        ]);

        return Redirect()->route('home.about')->with('success','About Update Successfully');
       }

       public function UpdateDelete($id){
           $delete = HomeAbout::find($id)->Delete();

        return Redirect()->route('home.about')->with('success','About Delete Successfully');

       }



       public function Portfolio(){
           $multipics = Multipic::all();
           return view('layouts.pages.portfolio',compact('multipics'));
       }




}
