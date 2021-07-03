<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['show']]);
    // }

    public function index()
    {
        // return Item::orderBy('created_at', 'DESC')->get();
        // return "Berhasil";
        $product = Product::all();
        // $product = DB::table('products')->get();
        return Inertia::render('ProductList', ['products' => $product]);
        // if(Auth::check()) {
        // return response()->json($product);
        // return response()->json(auth()->$product);
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category')
        ->select('id',
        'product_name',
        'price',
        'description',
        'category',
        'image_url',
        'price',
        'sold',
        'stock',
        'rating'
        )->where(['id' => $id])->get()->first();

        // $product = Product::find($id);

        // dd($product);
                   
        // $product = DB::table('products')
        //             ->join('product_category', 'products.id', '=', 'product_category.product_id')
        //             ->join()

        // return response()->json($product);

        return Inertia::render('ProductDetail', [
            'productDetail' => $product,
            'canLogin' => Route::has('login')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
