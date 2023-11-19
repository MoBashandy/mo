<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class AdminController extends Controller
{
    // Category
    public function view_category(){
        $data=Category::all();
        return view("admin.category",compact("data"));
    }
    public function delete_cateory($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Catagory Deleted Successfully');
    }

    public function add_category(Request $request){
        $data = new Category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Catagory Added Successfully');
    }
    // End Category
}
