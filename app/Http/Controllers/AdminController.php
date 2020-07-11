<?php

namespace App\Http\Controllers;


use App\Category;
use App\Products;
use App\Slider;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function AddCategory()
    {
        return view('admin.add_category');
    }

    public function AddProduct()
    {
        $categories = Category::get();
        return view('admin.add_product',compact('categories'));
    }


    public function AddSlider()
    {

        return view('admin.add_slider');
    }


    public function categories()
    {
        $categories = Category::get();
        return view('admin.all_categories',compact('categories'));
    }


    public function products()
    {
       $products = Products::get();
       return view('admin.all_products',compact('products'));
    }


    public function sliders()
    {
        $sliders = Slider::get();
        return view('admin.all_sliders',compact('sliders'));
    }

}
