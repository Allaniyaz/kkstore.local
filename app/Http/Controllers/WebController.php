<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class WebController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('home', $data);
    }

    public function shop_details()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('shop-details', $data);
    }

    public function shop_grid()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->paginate(12);

        return view('shop-grid', $data);
    }

    public function shoping_cart()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('shoping-cart', $data);
    }

    public function main()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('main', $data);
    }

    public function blog_details()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('blog-details', $data);
    }

    public function blog()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('blog', $data);
    }

    public function checkout()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('checkout', $data);
    }

    public function contact()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('contact', $data);
    }

    public function welcome()
    {
        $data['categories'] = Category::groupBy('name')->get();
        $data['products'] = Product::with('category')->get();

        return view('welcome', $data);
    }
}
