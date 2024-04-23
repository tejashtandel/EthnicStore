<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'user_id' => 'required',
            'totalamount' => 'required',
        ]);
        $input = $request->all();

        checkout::insert([
            'userid' => $input['user_id'],
            'totalprice' => $input['totalamount'],

        ]);







        $data =  DB::table('carts')->select('product_id', 'quantity')->where('flagorder', 1)->where('flag', 1)->get();




        foreach ($data as $d) {

            $update = DB::table('product_details')->where('productid', '=', $d->product_id)->decrement('quantity', $d->quantity);
            $update1 = DB::table('stocks')->where('productid', '=', $d->product_id)->decrement('quantity', $d->quantity);
        }











        return redirect()->route('bill.index', ['order' => Auth::user()->id])->with('success', 'Added Successfully');
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
