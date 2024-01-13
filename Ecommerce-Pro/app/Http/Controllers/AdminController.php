<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
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

    // Product
    public function view_product(){
        $category =Category::all();
        return view("admin.product",compact("category"));
    }
    public function add_product(Request $request){
        $product= new Product ;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount=$request->discount;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;


        $product->save();
        return redirect()->back();
    }
    public function show_product(){
        $product =Product::all();
        return view("admin.show_product",compact("product"));
    }
    public function delete_product($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }
    public function update_product($id){
        $product=Product::find($id);
        $category =Category::all();
        return view("admin.update_product",compact("product","category"));
    }

    public function update_product_confirm(Request $request,$id){
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount=$request->discount;
        $product->category=$request->category;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);

        $product->image=$imagename;


        $product->save();
        return redirect()->back()->with('message','Catagory Updated Successfully');
    }
    public function order(){
        $order = order::all();
        return view('admin.order',compact('order'));
    }
    public function delivered($id){
        $order = order::find($id);
        $order->delivary_status="delivered";
        $order->payment_status="paid";
        $order->save();
        return redirect()->back()->with('message','Order Delivered Successfully');
    }
    public function print_pdf($id){
        $order=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

}
