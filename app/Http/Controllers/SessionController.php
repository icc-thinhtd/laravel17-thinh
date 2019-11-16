<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function set()
    {
        session(['name'=>'tran duc thinh','age'=>27]);
        //
        session()->put('day',20);
        //
        session()->flash('status', 'Task was successful!');
    }
    public function get()
    {
        $name = session()->get('name');
        $age = session()->get('age');
        echo $name.' - '.$age.' - '.session()->get('day').'</br>';
        echo session()->get('phone','0912345678').'</br>';

        //kiem tra ton tai session
        if (session()->has('age')){
            echo 'age co'.'</br>';
        }else{
            echo 'age khong'.'</br>';
        }

        if (session()->exists('phone')){
            echo 'phone co'.'</br>';
        }else{
            echo 'phone khong'.'</br>';
        }



        dd(session()->all());
    }
    public function get3(){
        //xoa du lieu khoi session
//        session()->pull('name');
        //
        echo session()->get('name');
    }
}
