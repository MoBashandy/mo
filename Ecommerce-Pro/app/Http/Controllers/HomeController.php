<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    public function index()
    {
        return view("Home.userpage");

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
