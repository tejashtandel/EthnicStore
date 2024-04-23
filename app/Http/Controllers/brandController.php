<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class brandController extends Controller
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
                $brand = DB::table('brands')->select('id', 'brand_name')->where('flag', 1)->get();
                return view('Admin.pages.brand.brand', compact('brand'));
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
                return view('Admin.pages.brand.create_brand');
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
            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        $brand = new brand;
        $brand->brand_name = $request->brand_name;
        $brand->save();
        // return redirect()->action([brandController::class,'index']);
        return redirect()->route('brand.index')->with('success', 'Brand Added successfully.');
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
                $brand = brand::find($id);
                return view('Admin.pages.brand.edit_brand', compact('brand'));
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
            'brand_name' => 'required',

        ]);
        $brand = brand::find($id);
        $brand->brand_name = $request->brand_name;

        $brand->save();
        return redirect()->route('brand.index')->with('success', 'Brand Updated successfully.');
        // return redirect()->action([brandController::class,'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brand = brand::find($id);
        $brand->flag = 0;
        $brand->save();
        // return redirect()->action([brandController::class,'index']);
        return redirect()->route('brand.index')->with('error', 'Brand Deleted successfully.');
    }
}
