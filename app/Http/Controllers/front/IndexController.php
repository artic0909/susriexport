<?php

namespace App\Http\Controllers\front;

use App\Models\Product;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('front.index', compact('products'));
    }

    public function aboutUs()
    {
        return view('front.aboutus');
    }



    public function contactUs()
    {
        return view('front.contactus');
    }

    public function ourProducts()
    {
        $products = Product::paginate(12);
        return view('products.ourAllProducts', compact('products'));
    }



    public function ourcategories()
    {
        $categories = Category::paginate(8);
        // dd($categories);
        return view('products.categories', compact('categories'));
    }




    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $categoryId = $product->category_id;
        $category = Category::find($categoryId);

        if ($category) {
            $categorySlug = $category->slug;
        } else {
            $categorySlug = null;
        }

        $category = Category::find($categoryId);

        if ($category) {
            $relatedProducts = Product::where('category_id', $categoryId)
                ->where('id', '!=', $product->id)
                ->get();
        } else {
            $relatedProducts = collect();
        }

        return view('products.singleProductt', compact('product', 'relatedProducts', 'categorySlug'));
    }



    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        // Paginate the products directly within the query builder
        $products = Product::where('category_id', $category->id)->paginate(8);

        return view('products.products', compact('products', 'category'));
    }






    public function adminlogin()
    {
        return view('admin.logAdmin');
    }
}
