<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    //
    public function AllBrand(){
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }



    public function StoreBrand(Request $request){
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:5',
            // mimes ata 1ta extantion jar madome validetion hbe
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer Then 5 Characters'
        ]);


        $brand_image = $request->file('brand_image');
        // $name_gen = hexdec(uniqid());
        // $img_ext =  strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location =  'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

        $last_img = 'image/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image'  => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand Inserted Successfully');

    }

    public function Edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    public function Update(Request $request,$id){
        $validatedData = $request->validate([
                'brand_name' => 'required|min:5'
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_image.min' => 'Brand Longer Then 5 Characters'
            ]);

            $brand_image = $request->file('brand_image');
            $old_image = $request->old_image;



        if($brand_image){

            // $name_gen = hexdec(uniqid());
            // $img_ext =  strtolower($brand_image->getClientOriginalExtension());
            // $img_name = $name_gen.'.'.$img_ext;
            // $up_location =  'image/brand/';
            // $last_img = $up_location.$img_name;
            // $brand_image->move($up_location,$img_name);
            
            $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

            $last_img = 'image/brand/'.$name_gen;

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image'  => $last_img,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success','Brand Update Successfully');


        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->back()->with('success','Brand Update Successfully');

        }
    }


    public function Delete($id){
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Brand Delete Successfully');

    }


}
