<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = count(User::get());
        $product_count = count(Product::get());

        $product_new = Product::latest()->simplePaginate(10);
        return view('backend.pages.dashboard')->with([
            'product_new'=>$product_new,
            'user_count'=>$user_count,
            'product_count'=>$product_count
        ]);
    }
}
