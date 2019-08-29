<?php

namespace App\Http\Controllers\admin;

use Image;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function addSlider()
    {
        return view('admin/slider/addSlider');
    }
    public function insertSlider(Request $request)
    {
        $request->validate([
            'slider_name' => 'required',
            'slider_description' => 'required',
            'slider_price' => 'required|numeric',
            'collection_year' => 'required|numeric',
            // 'slider_image' => 'required',
            'button_name' => 'required',
            'button_link' => 'required',

        ]);

        
        $slider_id =  Slider::insertGetId([
            'slider_name'        =>$request->slider_name,
            'slider_description' =>$request->slider_description,
            'slider_price'       =>$request->slider_price,
            'collection_year'    =>$request->collection_year,
            'button_name'        =>$request->button_name,
            'button_link'        =>$request->button_link,
            'created_at'         => Carbon::now(),

        ]);
        // return $product_id;

        // if($request->hasFile('slider_image')){
            
        if($request->hasFile('slider_image')){
            //$slider_id = 7;
            $slider_image = $request->file('slider_image');
            $filename = $slider_id . '.' . $slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(150, 195)->save( base_path('public/uploads/image/slider/' . $filename ),40 );
            Slider::find($slider_id)->update([
                'slider_image' =>$filename,
            ]);
        }
        
        return redirect('/admin/view/slider')->with('status','Slider successfully added');

    }
    public function viewSlider()
    {
        $sliders = Slider::all();
        $deleted_sliders = Slider::onlyTrashed()->get();
        // return $sliders;
        return view('admin/slider/viewSlider', compact('sliders','deleted_sliders'));
    }
    public function deleteSlider($slider_id)
    {
        Slider::findOrFail($slider_id)->delete();
        return back()->with('status','Slider Deleted successfully');
    }
    public function restoreSlider($slider_id)
    {
        Slider::withTrashed()->findOrFail($slider_id)->restore();
        return back()->with('status','Slider restore successfully');
    }
    public function finalDeleteSlider($slider_id)
    {
        Slider::withTrashed()->findOrFail($slider_id)->forceDelete();
        return back()->with('status','Slider Finally Delete successfully');
    }
    public function editSlider($slider_id)
    {
        $editInfo = Slider::findOrFail($slider_id);
        return view('admin/slider/editSlider', compact('editInfo'));
    }
    public function updateSlider(Request $request)
    {
        $request->validate([
            'slider_name' => 'required',
            'slider_description' => 'required',
            'slider_price' => 'required|numeric',
            'collection_year' => 'required|numeric',
            // 'slider_image' => 'required',
            'button_name' => 'required',
            'button_link' => 'required',

        ]);

        $slider_id = $request->slider_id;
         Slider::findOrFail($request->slider_id)->update([
            'slider_name'        =>$request->slider_name,
            'slider_description' =>$request->slider_description,
            'slider_price'       =>$request->slider_price,
            'collection_year'    =>$request->collection_year,
            'button_name'        =>$request->button_name,
            'button_link'        =>$request->button_link,
            'created_at'         => Carbon::now(),

        ]);

        if($request->hasFile('slider_image')){
            
            if (Slider::find($request->slider_id)->slider_image != 'default_photo.jpg') {
                $link = base_path('public/uploads/image/slider/').Slider::find($request->slider_id)->slider_image;
                unlink($link);
            }
            $slider_image = $request->file('slider_image');
            $filename = $slider_id . '.' . $slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(150, 195)->save( base_path('public/uploads/image/slider/' . $filename ),40 );
            Slider::find($slider_id)->update([
                'slider_image' =>$filename,
            ]);
        }
        //return $request->slider_id;
        return redirect('/admin/view/slider')->with('status','Slider successfully Update');

    }
}