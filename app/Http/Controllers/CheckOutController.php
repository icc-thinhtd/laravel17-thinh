<?php

namespace App\Http\Controllers;

use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        if (count($carts)){
            $total = 0;
            foreach ($carts as $cart){
                $total+=($cart->qty*$cart->price);
            }
            if (Auth::check()){
                $user = User::where('email',Auth::user()->email)->first();
                return view('frontend.checkouts.step2')->with('user',$user);
            }else{
                return view('frontend.checkouts.step1')->with([
                    'total'=>$total,
                    'carts'=>$carts
                ]);
            }
        }else{
            return redirect()->route('2nds');
        }


    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            $user = User::where('email',$email)->first();
            return view('frontend.checkouts.step2')->with('user',$user);
        };
        return redirect()->route('frontend.checkout');

    }

    public function payment(Request $request){
        return view('frontend.checkouts.payment');
    }

    public function register(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
