<?php

namespace App\Http\Controllers;

use App\Models\product_detail;

use App\Models\carts;
use Illuminate\Http\Request;
use App\Models\checkout;
use App\Models\User;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Mail;


class buynowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $id = Auth::user()->id;
        $user = DB::table('users')->select('users.*')->where('users.id', '=', $id)->get();
        $footer = DB::table('footers')->get();

        $items = DB::table('checkouts')
            ->join('users', 'users.id', '=', 'checkouts.userid')
            ->join('carts', 'carts.user_id', '=', 'users.id')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('product_details', 'product_details.productid', '=', 'products.id')
            ->select(
                'checkouts.*',
                'checkouts.totalprice as grandtotal',
                'users.*',
                'carts.*',
                'checkouts.id as check_id',
                'products.*',
                'products.product_name as pname',
                'carts.totalprice as pc',
                'carts.quantity as qp',

                // 'product_models.id as productID',
                'product_details.*'
            )
            ->where('checkouts.userid', $id)
            ->where('checkouts.flag', 1)
            ->where('carts.flag', '=', 1)
            ->where('carts.flagorder', 1)->get();


        $bill = DB::table('checkouts')
            ->join('users', 'users.id', '=', 'checkouts.userid')
            ->join('carts', 'carts.user_id', '=', 'users.id')

            ->select(
                'checkouts.totalprice as grandtotal',
            )
            ->where('checkouts.userid', '=', $id)
            ->where('checkouts.flag', '=', 1)
            ->where('carts.flagorder', '=', 1)
            ->limit(1)->get();
        
        return view('User.pages.billingpage', compact('footer', 'user', 'items', 'bill'));
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

        ]);

        $input = $request->all();

        
        $update = DB::table('carts')->where('user_id', '=', $input['user_id'])->update(['flagorder' => 0]);
        $update = DB::table('checkouts')->where('userid', '=', $input['user_id'])->update(['flag' => 0]);

        $id = $input['user_id'];

        $orderMail = DB::table('users')->select('email')->where('id', $id)->get()->toArray();


        $emails = ['data' => 'Your Order Placed Succesfully', 'details' => 'You Will Recieve Your Order Within 7 days', 'closure' => 'Thank you for Shopping.'];
        $users = $orderMail[0]->email;

        Mail::send('orderMail', $emails, function ($messeges) use ($users) {
            $messeges->to($users);
            $messeges->subject('Order Placed');
        });

        return redirect()->route('home.index')->with('success', 'Your Order Placed Succesfully');
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
