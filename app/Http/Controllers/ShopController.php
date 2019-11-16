<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ShopController extends Controller
{

    public function __construct(){

    }

    public function index()
    {
//        dd(Cart::count());
        $user = User::find(1);
//        $user->userInfo;
        $contact_info = ['email'=>$user->email,'full_name'=>$user->details->full_name,'phone'=>$user->details->phone,'address'=>$user->details->address];
        $banners = Cache::remember('banners', 60, function() {
            return DB::table('banners')->get();
        });
//        dd($banners);
        $sales = Cache::remember('sales',60,function (){
            return Sale::get();
        });
        //
        $product_view = Cache::remember('product_view',60,function (){
            return Product::orderBy('view_count', 'DESC')->simplePaginate(16);
        });
        $product_price_down = Cache::remember('product_price_down',60,function (){
            return Product::where('price_status', 1)->get();
        });
        $product_best_sold = Cache::remember('product_best_sold',60,function (){
            return Product::where('price_status', 2)->get();
        });
        $product_best_sellers = Cache::remember('product_best_sellers',60,function (){
            return Product::orderBy('view_count', 'DESC')->simplePaginate(20);
        });

        return view('frontend.index')->with([
            'contact_info' => $contact_info,
            'banners' => $banners,
            'sales' => $sales,
            'product_view' => $product_view,
            'product_price_down' => $product_price_down,
            'product_best_sold' => $product_best_sold,
            'product_best_sellers' => $product_best_sellers,
            'cart_count' => Cart::count()
        ]);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $view_count = $product->view_count+1;
        $product->view_count = $view_count;
        $product->save();
//        dd($product->images);
//        return view('frontend.shops.product')->with(['product'=>$product]);
        return view('frontend.shops.detail')->with(['product'=>$product]);
    }

    public function contact()
    {
        return view('frontend.shops.contact');
    }

    public function cart()
    {
//        Cart::destroy();
        $carts = Cart::content();
        if (count($carts)) {
            View::share('cart_count', Cart::count());
            View::share('carts', $carts);
            $total = 0;
            foreach ($carts as $cart) {
                $total += ($cart->qty * $cart->price);
            }
            return view('frontend.shops.cart')->with([
                'carts' => $carts,
                'total' => $total
            ]);
        }else{
            return redirect()->route('2nds');
        }
    }

    public function cart_add(Request $request)
    {
        $product_id = $request->get('product_id');
        $product = Product::find($product_id);
        Cart::add($product_id,$product->name,1,$product->price,0, [
            'image' => $product->image
        ]);

        return redirect()->route('2nds');

    }
    public function cart_buy(Request $request)
    {
        $product_id = $request->get('product_id');
        $product = Product::find($product_id);
        Cart::add($product_id,$product->name,1,$product->price,0, [
            'image' => $product->image
        ]);

        return redirect()->route('2nds');

    }
    public function shop($slug)
    {
        $cate = Category::where('slug',$slug)->first();
//        dd($cate->id);
        $products = Product::where('category_id',$cate->id)->get();
//        dd($product);
        return view('frontend.shops.shop')->with(['products'=>$products]);
    }

    public function blog()
    {
        return view('frontend.shops.blog');
    }

}
