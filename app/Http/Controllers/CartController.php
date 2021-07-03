<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Providers\RouteServiceProvider;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::with('product', 'user')
        ->select('id',
            'user_id',
            'product_id',
            'quantity'
        )->where('user_id', '=', Auth::id())->get();

        return Inertia::render('Cart', [
            'cart' => $cart
        ]);
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
        $productCheck = Cart::with('product', 'user')
        ->where('user_id', '=', Auth::id())
        ->where('product_id', '=', $request->product_id)
        ->first();

        $cartQuantity = Cart::with('product', 'user')
        ->select('quantity')
        ->where('user_id', '=', Auth::id())
        ->where('product_id', '=', $request->product_id)
        ->first();

        $productQuantity = Product::with('category')
        ->select('id',
        'sold',
        'stock'
        )->where(['id' => $request->product_id])->get()->first();

        if(Auth::user()) {
            if($productCheck) {
                Cart::where([
                    'user_id'=> Auth::id(),
                    'product_id'=>$request->product_id
                ])
                ->increment('quantity');
                
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ]);

            }
            
            return response()->json([
                'status'=>  201,
                'message'=>'Product added to cart'
            ], 201);
        } 
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
