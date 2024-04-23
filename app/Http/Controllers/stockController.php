<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;
use Illuminate\Support\Facades\DB;

class stockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock = DB::table('product_details')
            ->join('products','product_details.productid','products.id')
            ->select('product_details.*', 'product_details.productid','product_details.size','product_details.quantity','products.product_name','products.price')
           
            ->get();
            
                    return view('Admin.pages.stocks.stock', compact('stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proddetails = DB::select('SELECT * FROM product_details');
        return view('Admin.pages.stocks.create_stock', compact('proddetails'));
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
            'productid' => 'required',
            'size' => 'required|regex:/^[\pL\s\-]+$/u',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
        ]);
        $stock = new stock;
        $stock->productid = $request->productid;
        $stock->size = $request->size;
        $stock->quantity = $request->quantity->decrement('product_details.quantity'-'checkout.quantity');
        $stock->price = $request->price;
        $stock->save();
        // return redirect()->action([subcategoryController::class,'index']);
        // return back()->with('success','SubCategory Created Successfully');
        return redirect()->route('stocks.index')->with('success', 'stocks Added successfully.');
    
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
        $stock = stock::find($id);
        return view('Admin.pages.stocks.edit_stock', compact('stock'));
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

        $request->validate([
            'size' => 'required|regex:/^[\pL\s\-]+$/u',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $stock = stock::find($id);
        $stock->size = $request->size;
        $stock->quantity = $request->quantity;
        $stock->price = $request->price;
        $stock->save();
        return redirect()->route('stocks.index')->with('success', 'stocks Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = stock::find($id);
        $stock->flag = 0;
        $stock->save();

        return redirect()->route('stocks.index')->with('error', 'stocks Deleted successfully.');
    }
}
