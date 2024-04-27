<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products', compact('categories', 'products'));
    }

    public function filterByCategory(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->input('category');
        $product_id = Product::find($request->input('product_id'));

        if ($selectedCategory) {
            $category = Category::where('name', $selectedCategory)->first();
            $products = $category->products;
        } else {
            $products = [];
        }

        return view('products', compact('categories', 'products', 'product_id'));
    }

    public function create()
    {
        if (auth()->user()->is_admin) {
            $categories = Category::all();
            return view('admin.products.create', compact('categories'));

        } else {
            abort(403);
        }
    }

    public function create_category()
    {
        if(auth()->user()->is_admin) {
            return view('admin.products.create_category');
        }else{
            abort(403);
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->is_admin) {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->category_id = $request->input('category_id');
            $product->image = $this->uploadPhoto($request);
            $product->save();
            return back()->with('success', 'Product created successfully.');
        }

    }
        public function uploadPhoto($request)
        {
            $path = $request->file('image')->store('products', 'public');
            return $path;
        }

    public function storeCategory(Request $request)
    {
        if (auth()->user()->is_admin) {
            $request->validate([
                'name' => 'required|unique:categories',
            ]);

            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();

            return back()->with('success', 'Category created successfully.');
        }
    }
}
