<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Illuminate\Support\Facades\Auth;
Use App\Notifications\MyFirstNOT;
use Illuminate\Support\Facades\Notification;
class AdminController extends Controller
{
    // Category
    public function view_category(){
        if(Auth::id()){
            $data=Category::all();
            return view("admin.category",compact("data"));
        }
        else{
            return redirect('login');
        }
    }
    public function delete_cateory($id){
        if(Auth::id()){
            $data=Category::find($id);
            $data->delete();
            return redirect()->back()->with('message','Catagory Deleted Successfully');
        }
        else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        if(Auth::id()){
            $data = new Category;
            $data->category_name=$request->category;
            $data->save();
            return redirect()->back()->with('message','Catagory Added Successfully');
        }
        else{
            return redirect('login');
        }
    }
    // End Category

    // Product
    public function view_product(){
        if(Auth::id()){
            $category =Category::all();
            return view("admin.product",compact("category"));
        }
        else{
            return redirect('login');
        }
    }
    public function add_product(Request $request){
        if(Auth::id()){
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
        else{
            return redirect('login');
        }
    }
    public function show_product(){
        if(Auth::id()){
            $product =Product::all();
            return view("admin.show_product",compact("product"));
        }
        else{
            return redirect('login');
        }
    }
    public function delete_product($id){
        if(Auth::id()){
            $data=Product::find($id);
            $data->delete();
            return redirect()->back()->with('message','Product Deleted Successfully');
        }
        else{
            return redirect('login');
        }
    }
    public function update_product($id){
        if(Auth::id()){
            $product=Product::find($id);
            $category =Category::all();
            return view("admin.update_product",compact("product","category"));
        }
        else{
            return redirect('login');
        }
    }

    public function update_product_confirm(Request $request,$id){
        if(Auth::id()){
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
        else{
            return redirect('login');
        }
    }
    //End Product

    //order
    public function order(){
        if(Auth::id()){
            $order = order::all();
            return view('admin.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    public function delivered($id){
        if(Auth::id()){
            $order = order::find($id);
            $order->delivary_status="delivered";
            $order->payment_status="paid";
            $order->save();
            return redirect()->back()->with('message','Order Delivered Successfully');
        }
        else{
            return redirect('login');
        }
    }
    public function print_pdf($id){
        if(Auth::id()){
            $order=Order::find($id);
            $pdf=PDF::loadView('admin.pdf',compact('order'));
            return $pdf->download('order_details.pdf');
        }
        else{
            return redirect('login');
        }
    }

    public function send_email($id){
        if(Auth::id()){
            $order=order::find($id);
            return view('admin.email_info',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    public function send_user_email(Request $request,$id){
        if(Auth::id()){
            $order=Order::find($id);
            $details = [
                            'greeting' => $request->greating,
                            'first' => $request->first,
                            'body' => $request->body,
                            'button' => $request->button,
                            'url' => $request->url,
                            'last' => $request->last,
                        ];
            notification::send($order,new MyFirstNOT($details));
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }
    public function searchat(Request $request){
        if(Auth::id()){
            $search=$request->search;
            $order = Order::where('name', 'LIKE', "%$search%")
            ->orWhere('phone', 'LIKE', "%$search%")
            ->orWhere('product_title', 'LIKE', "%$search%")
            ->get();
            return view('admin.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
}
