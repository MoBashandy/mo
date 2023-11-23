<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate();
        return view("Home.userpage",compact("product"));

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
}
