<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class productReportController extends Controller
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
                $data = DB::table('products AS p')->select('p.id', 'p.product_name', 'p.price', 'p.image', 's.subcategoryname', 'c.category_name', 'pd.size', 'pd.quantity')
                    ->join('subcategories AS s', 'p.sub_cat_id', '=', 's.id')
                    ->join('category AS C', 's.catid', '=', 'c.id')
                    ->join('product_details AS pd', 'pd.productid', '=', 'p.id')
                    ->get();
                // $subc=DB::find()->with('category')->get();
                return view('Admin.pages.reports.productreport', compact('data'));
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
    public function search(Request $request)
    {
        $s = $request->search;
        $result= DB::table('products AS p')->select('p.id', 'p.product_name', 'p.price', 'p.image', 's.subcategoryname', 'c.category_name', 'pd.size', 'pd.quantity')
        ->join('subcategories AS s', 'p.sub_cat_id', '=', 's.id')
        ->join('category AS c', 's.catid', '=', 'c.id')
        ->join('product_details AS pd', 'pd.productid', '=', 'p.id')
        ->where('p.product_name', 'LIKE', '%' . $s . '%')
        ->get()->toArray();
   
        $html = '<div class="container products">

           <table class="table table-bordered" id="example">
           
           <thead>
           <tr>
           <th>Category Name</th>
           <th>Subcategory Name</th>
           <th>Product Name</th>
           <th>Size</th>
           <th>Price</th>
           <th>Image</th>
           </tr>
           </thead>  <tbody>';

        foreach ($result as $dta) {
            $html .= ' 
      <tr>
        <td>' . $dta->category_name . '</td>
            <td>' . $dta->subcategoryname . '</td>
            <td>' . $dta->product_name . '</td>
            <td>' . $dta->size . '</td>
            <td>' . $dta->price . '</td>
            <td>' . $dta->image . '</td>
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
