<?php

namespace App\Http\Controllers\admin;

use App\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    public function addSize()
    {
        $sizes = Size::all();
        $deletedSizes = Size::onlyTrashed()->get();
        return view('admin.size.addSize', compact('sizes','deletedSizes'));
    }
    public function insertSize(Request $request)
    {
        $request->validate([
            'size' => 'required',
        ]);

        Size::Insert([
            'size' => $request->size,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('status','New Size successfully Add');
    }
    public function deleteSize($size_id)
    {
        Size::findOrFail($size_id)->delete();
        return back()->with('status','Size Successfully Deleted');
    }
    public function restoreSize($size_id)
    {
        Size::withTrashed()->find($size_id)->restore();
        return back()->with('status','Size Successfully Restore');
    }
    
}
