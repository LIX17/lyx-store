<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\Admin\ProductRequest;
use App\ProductGallery;
use illuminate\Support\Str;

class DashboardProductController extends Controller
{
    public function index()
    {
        $products = Product::with('galleries', 'category')
                        ->where('users_id', Auth::user()->id)
                        ->get();

        $data = [];
        $data["products"] = $products;

        return view('pages.dashboard-products', $data);
    }

    public function create()
    {
        $categories = Category::all();
        
        $data = [];
        $data["categories"] = $categories;

        return view('pages.dashboard-products-create', $data);
    }

    public function store(ProductRequest $request)
    {        
        // dd($request);
        $data = $request->all();
        $data["slug"] = Str::slug($request->name);
        $product = Product::create($data);        

        $gallery = [
            'products_id' => $product->id,
            'url'      => $request->file('photo')->store('assets/product', 'public')
        ];
        ProductGallery::create($gallery);

        return redirect()->route('dashboard-product');
    }

    public function detail(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();

        $data = [];
        $data['product'] = $product;
        $data['categories'] = $categories;

        return view('pages.dashboard-products-detail', $data);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();
        $data['url'] = $request->file('url')->store('assets/product', 'public');
        
        ProductGallery::create($data);

        return redirect()->route('dashboard-product-detail', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);    
        $item->delete();

        return redirect()->route('dashboard-product-detail', $item->products_id);
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);
        $item->update($data);

        return redirect()->route('dashboard-product');
    }
}
