<?php

namespace App\Http\Controllers\admin;


use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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

    
    public function addCategory()
    {
        $categories = Category::paginate(6);

        // return view('admin/category', compact('categories'));
        return view('admin.category.addCategory', compact('categories'));
    }
    public function insertCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
        Category::insertGetId([
            'category_name' => $request->category_name,
            'created_at'    => Carbon::now(),
        ]);
        return redirect('admin/category')->with('status','category successfully added');
    }
    
    public function deleteCategory($category_id){
        Category::findOrFail($category_id)->delete();
        return back()->with('status','category successfully Deleted');;
    }
}
