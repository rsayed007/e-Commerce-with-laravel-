<?php

namespace App\Http\Controllers\admin;

use App\Color;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ColorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function addColors()
    {
        // ------ For get all color 
        // $colors = Color::all(); 
        // ------ For get value with pagination  
         $colors = Color::paginate(6);   
        return view('admin.color.addColor', compact('colors'));
    }
    public function insertColors(Request $request)
    {
        $request->validate([
            'color_name' => 'required',
            'color_code' => 'required',
        ]);
        Color::Insert([
            'color_name' => $request->color_name,
            'color_code' => $request->color_code,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('status','category successfully added');
    }
    public function deleteColor($color_id)
    {
        Color::findOrFail($color_id)->delete();
        return back()->with('status','category successfully Deleted');
    }
}
