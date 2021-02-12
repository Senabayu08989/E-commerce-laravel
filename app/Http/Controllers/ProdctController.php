<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
class ProdctController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('Product/index',['products'=>$data]);
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
        $data=Product::find($id);
        return view('product/detail',compact('data'));
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

    public function search(Request $request)
    {

        $data = Product::where('name','like','%'.$request->input('query').'%')->get();
        // return view('product/search',['products'=>$data]);
        return view('product/search',compact('data'));
    }

    public function addToCart(Request $request)
    {
       if($request->session()->has('user'))
       {
         $cart = new Cart;
         $cart->user_id=$request->session()->get('user')['id'];
         $cart->product_id=$request->product_id;
         $cart->save();

         return redirect('/');
       }
       else{
           return redirect('/login');
       }
    }

    static function cartItem()
    {
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
}
