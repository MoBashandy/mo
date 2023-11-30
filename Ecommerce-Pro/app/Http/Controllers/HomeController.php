<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(3);
        return view("Home.userpage", compact('product'));
    }
    public function AdminDashboard()
    {
        $user = Auth::user(); // Retrieve the authenticated user

        if ($user && $user->usertype == 1) {
            return view("admin.home");
        } else {
            return view("Home.userpage");
        }
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view("Home.product_details",compact("product"));
    }
    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user= Auth::user();
            $product= Product::find($id);
            $cart= new Cart;
            $cart -> name = $user -> name;
            $cart -> email = $user -> email;
            $cart -> phone = $user -> phone;
            $cart -> address = $user -> address;
            $cart -> user_id = $user -> id;

            $cart -> product_title = $product -> title;
            $cart -> product_id = $product -> id;
            if($product -> discount){
                $cart -> price = $product -> discount * $request -> quantity ;
            }
            else{
                $cart -> price = $product -> price * $request -> quantity ;
            }
            $cart -> image = $product -> image;
            $cart -> quantity = $request -> quantity;

            $cart -> save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

        public function show_cart()
        {
            // Check if the user is authenticated
            if (Auth::check()) {
                $id = Auth::user()->id;
                $cart = Cart::where('user_id', '=', $id)->get();
                return view("Home.show_cart", compact("cart"));
            } else {
                return redirect('login');
            }
        }

    }

