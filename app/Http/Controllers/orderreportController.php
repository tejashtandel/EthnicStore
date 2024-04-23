<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class orderreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->role == '1') {


                $orders = DB::table('users')
                    ->join('checkouts', 'users.id', '=', 'checkouts.userid')
                    ->join('products', 'users.id', '=', 'products.id')
                    ->select('users.firstname', 'checkouts.id', 'products.product_name', 'checkouts.totalprice')
                    ->get();

                return view('Admin.pages.reports.orderreport', compact('orders'));
            } else {
                return "You are Not  A Admin";
            }
        }
    }
    // public function index()
    // {
    //     if (Auth::check()) {
    //         if (Auth::user()->role == '1') {
    //             $orders = DB::table('checkouts')
    //                 ->join('users', 'checkouts.userid', '=', 'users.id')
    //                 ->join('carts', 'carts.user_id', '=', 'users.id')
    //                 ->join('products', 'products.id', '=', 'carts.product_id')
    //                 ->select('users.firstname', 'checkouts.id', 'products.product_name', 'checkouts.totalprice')
    //                 ->where('checkouts.flag', '=', 1)
    //                 ->where('carts.flagorder', '=', 1)
    //                 ->get();
    
    //             return view('Admin.pages.reports.orderreport', compact('orders'));
    //         } else {
    //             return "You are Not an Admin";
    //         }
    //     }
    // }
    
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
    public function searcho(Request $request)
    {
        $s = $request->search;

        $result = DB::table('users')
        ->join('checkouts', 'users.id', '=', 'checkouts.userid')
        ->join('products', 'users.id', '=', 'products.id')
        ->select('users.firstname', 'checkouts.id', 'products.product_name', 'checkouts.totalprice')
        ->where('users.name', 'LIKE', '%' . $s . '%')
       
        ->get()->toArray();
   
        $html = '<div class="container order">

           <table class="table table-bordered" id="example">
           
           <thead>
           <tr>
           <th>First Name</th>
           <th>Order Id</th>
           <th>Product Name</th>
           <th>Total Amount</th>
           </tr>
           </thead>  <tbody>';

        foreach ($result as $dta) {
            $html .= ' 
      <tr>
        <td>' . $dta->firstname . '</td>
            <td>' . $dta->id . '</td>
            <td>' . $dta->product_name . '</td>
            <td>' . $dta->totalprice . '</td>
        </tr> </tbody>';
        }
        $html .= '</table></div>';

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully',
                'html' => $html,
            ]
        );
    }
}
