<?php

namespace App\Http\Controllers;


use App\Category;
use App\Products;
use App\Slider;

class ClientController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status',1)->get();
        $products = Products::where('status',1)->get();
        return view('client.home',compact('sliders','products'));
    }

    public function shop()
    {
        $categories = Category::get();
        $products = Products::where('status',1)->get();
        return view('client.shop',compact('products','categories'));
    }


    public function checkout()
    {

        return view('client.checkout');
    }

}
