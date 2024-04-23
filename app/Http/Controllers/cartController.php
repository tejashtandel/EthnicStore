<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\DB;


class cartController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('cart.show', ['cart' => Auth::user()->id]);
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
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'quantity' => 'required',
            'totalprice' => 'required ',
        ]);

        $product_id = $request->product_id;
        $user_id = $request->user_id;
        $quantity = $request->quantity;
        $totalprice = $request->totalprice;

        cart::create(['product_id' => $product_id, 'user_id' => $user_id, 'quantity' => $quantity, 'totalprice' => $totalprice]);

        return redirect()->route('cart.show', ['cart' =>  Auth::user()->id])->with('done', 'product added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->join('product_details', 'product_details.productid', '=', 'products.id')
            ->select('products.*', 'users.*', 'product_details.*', 'carts.*', 'users.id as uid', 'products.id as pID', 'carts.id as cID','product_details.quantity as pq')
            ->where('carts.flag', '=', 1)
            ->where('carts.flagorder', '=', '1')
            ->where('users.id', $id)->get();
        $footer = DB::table('footers')->get();

        return view('User.pages.cart1', compact('cart', 'footer'));
    }


    // ->get();


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
    public function update(Request $request)
    {

        // $q=$request->q;
        // dd($q);
        // exit();
        $update = DB::table('carts')->where('product_id', '=', $request->id)->where('user_id', '=', $request->userid)->update(['quantity' => $request->q]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cart = cart::find($id);
        $cart->flag = 0;
        $cart->update($request->all());
        return redirect()->route('cart.show', ['cart' => Auth::user()->id])->with('success', 'Removed Item Successfully');
    }



    // public function updatequantity(Request $request)
    // {
    //     $q = $request->quantity;
    //     // echo '<pre>';
    //     // print_r($q);
    //     // echo '</pre>';
    //     // exit();
    //     $update = DB::table('product_details')->where('productid', '=', $request->id)->decrement('quantity', $q);


    //     $update1 = DB::table('stocks')->where('productid', '=', $request->id)->decrement('quantity', $q);
    // }



    // public function try()
    // {

    //     $try = DB::table('product_details')
    //     ->join('category', 'category.id', '=', 'product_details.catid')
       


       
        
    //     ->where('category.flag',1)
    // ->sum('product_details.quantity');
   


  
 

   


    // dd($try);
    // exit();
    // }


    // }



}
