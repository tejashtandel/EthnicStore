<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class productdetailController extends Controller
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

                $proddetails = DB::table('product_details')
                    ->join('category', 'product_details.catid', '=', 'category.id')
                    ->join('subcategories', 'product_details.sub_cat_id', '=', 'subcategories.id')
                    ->join('products', 'product_details.productid', '=', 'products.id')
                    ->join('brands', 'product_details.brandid', '=', 'brands.id')
                    ->select('product_details.*', 'category.category_name', 'subcategories.subcategoryname', 'products.product_name','brands.brand_name')
                    ->where('product_details.flag', 1)
                    ->get();
                return view('Admin.pages.product_details.product_details', compact('proddetails'));
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
                $brand = DB::select('SELECT * FROM brands');
                $proddetails = DB::table('products')->select('products.*')->where('products.flag','=',1)->orderBy('created_at','desc')->get();
                $subc =DB::table('category')->select('category.*')->where('category.flag','=',1)->get();
                $product =DB::table('subcategories')->select('subcategories.*')->where('subcategories.flag','=',1)->get();
                return view('Admin.pages.product_details.create_product_details', compact('product', 'brand', 'subc', 'proddetails'));
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
            'catid' => 'required',
            'sub_cat_id' => 'required',
            'productid' => 'required',
            'brandid' => 'required',
            'pattern' => 'required|regex:/^[\pL\s\-]+$/u',
            'sleeve' => 'required|regex:/^[\pL\s\-]+$/u',
            'neck' => 'required|regex:/^[\pL\s\-]+$/u',
            'fabric' => 'required|regex:/^[\pL\s\-]+$/u',
            'length' => 'required|regex:/^[\pL\s\-]+$/u',
            'style' => 'required|regex:/^[\pL\s\-]+$/u',
            'occasion' => 'required|regex:/^[\pL\s\-]+$/u',
            'package_contain' => 'required|integer',
            'product_description' => 'required|regex:/^[\pL\s\-]+$/u',
            'size' => 'required',
            'quantity' => 'required',
            'bottomtype' => 'required|regex:/^[\pL\s\-]+$/u',
            'mulimages' => 'required'
        ]);

        $input = $request->all();
        $mulimages = array();
        if ($files = $request->file('mulimages')) {
            foreach ($files as $file) {
                $destinationPath = 'upload/';
                $name = date('YmdHis') . "." . $file->getClientOriginalName();
                $file->move($destinationPath, $name);
                $mulimages[] = $name;
            }
        }



        /*Insert your data*/

        product_detail::insert([

            'catid' => $input['catid'],
            'sub_cat_id' => $input['sub_cat_id'],
            'productid' => $input['productid'],
            'brandid' => $input['brandid'],
            'pattern' => $input['pattern'],
            'sleeve' => $input['sleeve'],
            'neck' => $input['neck'],
            'fabric' => $input['fabric'],
            'length' => $input['length'],
            'style' => $input['style'],
            'occasion' => $input['occasion'],
            'package_contain' => $input['package_contain'],
            'product_description' => $input['product_description'],
            'size' => $input['size'],
            'quantity' => $input['quantity'],
            'bottomtype' => $input['bottomtype'],
            'mulimages' =>  implode("|", $mulimages),
        ]);

        // return redirect()->route('product.create')->with('success', 'Product Details created Successfully');
        //  return redirect()->action([productdetailController::class,'index']);
        return redirect()->route('product_detail.index')->with('success', 'Products Details Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proddetails = DB::table('product_details')
            ->join('category', 'product_details.catid', '=', 'category.id')
            ->join('subcategories', 'product_details.sub_cat_id', '=', 'subcategories.id')
            ->join('products', 'product_details.productid', '=', 'products.id')
            ->join('brands', 'product_details.brandid', '=', 'brands.id')
            ->select('product_details.*', 'category.category_name', 'subcategories.subcategoryname', 'products.product_name')
            ->where('product_details.id', $id)
            ->get();
        return view('Admin.pages.product_details.product_detailsss', compact('proddetails'));
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
                $productsdetail = product_detail::find($id);
                return view('Admin.pages.product_details.edit_product_details', compact('productsdetail'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'pattern' => 'required',
            'sleeve' => 'required',
            'neck' => 'required',
            'fabric' => 'required',
            'length' => 'required',
            'style' => 'required',
            'occasion' => 'required',
            'package_contain' => 'required',
            'product_description' => 'required',
            'bottomtype' => 'required',
            'mulimages' => 'required'
        ]);

        $productsdetail = product_detail::find($id);
        $input = $request->all();
        $mulimages = array();
        if ($files = $request->file('mulimages')) {
            foreach ($files as $file) {
                $destinationPath = 'upload/';
                $name = $file->getClientOriginalName();
                $file->move($destinationPath, $name);
                $mulimages[] = $name;
                $input['mulimages'] =  implode("|", $mulimages);
            }
        } else {
            unset($input['mulimages']);
        }

        if ($size_guide = $request->file('size_guide')) {

            $destinationPath = 'size_guide/';
            $profileImage = date('YmdHis') . "." . $size_guide->getClientOriginalExtension();
            $size_guide->move($destinationPath, $profileImage);
            $input['size_guide'] = "$profileImage";
        } else {
            unset($input['size_guide']);
        }
        $productsdetail->update($input);
        // $productsdetail->mulimages=$request->mulimages;
        // $productsdetail->pattern = $request->pattern;
        // $productsdetail->sleeve = $request->sleeve;
        // $productsdetail->neck = $request->neck;
        // $productsdetail->fabric = $request->fabric;
        // $productsdetail->length = $request->length;
        // $productsdetail->style = $request->style;
        // $productsdetail->occasion = $request->occasion;
        // $productsdetail->package_contain = $request->package_contain;
        // $productsdetail->product_description = $request->product_description;
        // $productsdetail->bottomtype = $request->bottomtype;
        // $productsdetail->save();
        return redirect()->route('product_detail.index')->with('success', 'Products Details Updated successfully.');
        // return redirect()->route('product_detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $productsdetail = product_detail::find($id);
        $productsdetail->flag = 0;
        $productsdetail->save();
        //return redirect()->action([productdetailController::class,'index']);
        return redirect()->route('product_detail.index')->with('error', 'Products Details Deleted successfully.');
    }
}
