<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
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
                // $product = DB::SELECT('SELECT products.product_name, subcategories.id, subcategories.subcategoryname,products.color,products.size,products.price,products.image FROM products JOIN subcategories ON products.sub_cat_id=subcategories.id where Products.flag="1"'); 
                //$product= DB::select('SELECT * FROM subcategories');; 
                $product = DB::table('products as p')->select('p.id', 'p.product_name', 'p.price', 'p.color', 'p.image', 's.subcategoryname')
                    ->join('subcategories as s', 'p.sub_cat_id', '=', 's.id')
                    ->where('p.flag', 1)
                    ->get();
                return view('Admin.pages.product.product', compact('product'));
            } else {
                return "You are Not  A Admin";
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {

            if (Auth::user()->role == '1') {
                $product = DB::select('SELECT * FROM subcategories');
                return view('Admin.pages.product.create_product', compact('product'));
            } else {
                return "You are Not  A Admin";
            }
        }
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
            'sub_cat_id' => 'required',
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'size' => 'required|regex:/^[\pL\s\-]+$/u',
            'color' => 'required|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|integer',
            'image' => 'required'
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'admin/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        product::create($input);
        // return redirect()->action([productController::class,'index']);
        return redirect()->route('products.index')->with('success', 'Products Added successfully.');
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
        if (Auth::check()) {

            if (Auth::user()->role == '1') {
                $product = product::find($id);
                return view('Admin.pages.product.edit_product', compact('product'));
            } else {
                return "You are Not  A Admin";
            }
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'price' => 'required|integer',

        ]);

        // $product= product::find($id);
        // $product->product_name= $request->product_name;
        // $product->price = $request->price;
        // $product->image = $request->image;

        // $product->save();
        // return redirect()->action([productController::class,'index']);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'admin/product/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $product->update($input);
        return redirect()->route('products.index')->with('success', 'Products Updated successfully.');
        //  return redirect()->action([productController::class,'index']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = product::find($id);
        $product->flag = 0;
        $product->save();
        // return redirect()->action([productController::class,'index']);
        return redirect()->route('products.index')->with('error', 'Products Delete successfully.');
    }
}
