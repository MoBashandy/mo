<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
// use Session;
use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\Support\Facades\Hash;
Use App\Models\Comment;
Use App\Models\Reply;


class HomeController extends Controller
{
    public function AdminDashboard()
    {
        $user = Auth::user(); // Retrieve the authenticated user

        if ($user && $user->usertype == 1) {
            $product_count=Product::all()->count();
            $order_count=Order::all()->count();
            $user_count=User::all()->count();
            $order=order::all();
            $total_revenue=0;
            foreach ($order as $order){
                $total_revenue = $total_revenue + $order->price;
            };
            $delivary_status=order::where('delivary_status','=','delivered')->get()->count();
            $pro_status=order::where('delivary_status','=','processing')->get()->count();
            return view("admin.home",compact('product_count','order_count','user_count','total_revenue',
            'delivary_status','pro_status'));
        } else {
            $product =Product::paginate(3);
            $comment=Comment::orderby('id','desc')->get();
            $reply=Reply::all();
            return view("Home.userpage", compact('product','comment','reply'));
        }
    }
    public function index()
    {
        $product = Product::paginate(3);
        $comment=Comment::orderby('id','desc')->get();
        $reply=Reply::all();
        return view("Home.userpage", compact('product','comment','reply'));
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
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view("Home.show_cart", compact("cart"));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Removed Successfully');
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user -> id;
        $data = Cart::where('user_id','=', $userid)->get();
            foreach ($data as $data) {
            $order = new Order;
            $order -> name = $data -> name;
            $order -> email = $data -> email;
            $order -> phone = $data -> phone;
            $order -> address = $data -> address;
            $order -> user_id = $data -> user_id;

            $order -> product_title = $data -> product_title;
            $order -> product_id = $data -> product_id;
            $order -> price = $data -> price;
            $order -> quantity = $data -> quantity;
            $order -> image = $data -> image;

            $order -> payment_status ='cash on delivary';
            $order -> delivary_status ='processing';

            $order->save();

            $cart_id = $data -> id;
            $cart = cart::find($cart_id);
            $cart -> delete();
        }
        return redirect()->back()->with('message','We Have Recevied Your Order . We Will Connect With You Soon .');
    }
    public function stripe($total_price){
        return view('home.stripe',compact('total_price'));
    }

    public function stripePost(Request $request ,$total_price)

        {
            //Test
                    // dd($total_price);
            //Test
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment",
            ]);
          $user = Auth::user();
          $userid = $user -> id;
          $data = Cart::where('user_id','=', $userid)->get();
           foreach ($data as $data) {
              $order = new Order;
              $order -> name = $data -> name;
              $order -> email = $data -> email;
              $order -> phone = $data -> phone;
              $order -> address = $data -> address;
              $order -> user_id = $data -> user_id;

              $order -> product_title = $data -> product_title;
              $order -> product_id = $data -> product_id;
              $order -> price = $data -> price;
              $order -> quantity = $data -> quantity;
              $order -> image = $data -> image;

              $order -> payment_status ='paid';
              $order -> delivary_status ='processing';

              $order->save();

              $cart_id = $data -> id;
              $cart = cart::find($cart_id);
              $cart -> delete();
          }

      Session::flash('success', 'Payment Successfull!');

      return back();
    }
    public function show_order()
    {
        if (Auth::id()) {
            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=',$userid)->get();
            return view("Home.order",compact('order'));
        } else {
            return redirect('login');
        }
    }
    public function cancel_order($id)
    {
        $order=Order::find($id);
        $order->delivary_status="You Canceled The Order";
        $order->save();
        return redirect()->back()->with('message','Order Canceled Successfully');
    }
    public function comment(Request $request){
        if(Auth::id()){
            $comment= new Comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function reply(Request $request){
        if(Auth::id()){
            $reply= new Reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->reply=$request->reply;
            $reply->comment_id=$request->commentId;
            $reply->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

}
