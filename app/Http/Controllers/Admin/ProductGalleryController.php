<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductGallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductRequest;
use App\User;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = ProductGallery::with(['product']);
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                    <div class="btn-group">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="'. route('product.edit', $item->id). '">Edit</a>
                                <form action="'. route('product.destroy', $item->id) .'" method="POST">
                                    '. method_field('delete') . csrf_field() .'
                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    ';
                })                
                ->editColumn('url', function($item){
                    return $item->url ? '<img src="'. Storage::url($item->url) .'" style="max-height: 40px;"/>' : ''; 
                })
                ->rawColumns(['action', 'url'])
                ->make();
        }
        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data["users"] = User::all();
        $data["categories"] = Category::all();

        return view('pages.admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {        
        $data = $request->all();
        $data["slug"] = Str::slug($request->name);
        //dd($data);  
        Product::create($data);        

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data["product"] = Product::findOrFail($id);
        $data["users"] = User::all();
        $data["categories"] = Category::all();
        // dd($data);
        return view('pages.admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {        
        $data = $request->all();
        $data["slug"] = Str::slug($request->name);
        //dd($data);  
        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
