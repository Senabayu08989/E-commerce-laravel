<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use Session;
use Illuminate\Support\Facades\DB;
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

    public function cartList()
    {
        $userId=Session::get('user')['id'];
        $product = DB::table('cart')
        ->join ('products','cart.product_id','=','product_id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        // return $product;

        return view('product/cartlist',['products'=>$product]);
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    public function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total = $product = DB::table('cart')
        ->join ('products','cart.product_id','=','product_id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->sum('products.price');
        return view('product/ordernow',['total'=>$total]);
    }

    public function orderPlace(Request $request)
    {
        $userId=Session::get('user')['id'];
        $allCart= Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart )
        {
            $order=new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status='pending';
            $order->payment_method=$request->payment;
            $order->payment_status='pending';
            $order->address=$request->address;
            $order->save();

            Cart::where('user_id',$userId)->delete();
        }
       
        return redirect('/');
    }
}
