<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class subcategoryController extends Controller
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

                $subc = DB::table('subcategories')
                    ->join('category', 'subcategories.catid', '=', 'category.id')
                    ->select('subcategories.*', 'category.category_name')
                    ->where('subcategories.flag', 1)
                    ->where('category.flag', 1)
                    ->get();
                return view('Admin.pages.subcategory.subcategory', compact('subc'));
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


                $subc = DB::table('category')->select('id', 'category_name')->where('category.flag', 1)->get();
                return view('Admin.pages.subcategory.create_subcategory', compact('subc'));
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
            'subcategoryname' => 'required|regex:/^[\pL\s\-]+$/u'
        ]);
        $subc = new subcategory;
        $subc->catid = $request->catid;
        $subc->subcategoryname = $request->subcategoryname;
        $subc->save();
        // return redirect()->action([subcategoryController::class,'index']);
        // return back()->with('success','SubCategory Created Successfully');
        return redirect()->route('subcategory.index')->with('success', 'SubCategory Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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


                $subcategory = subcategory::find($id);
                return view('Admin.pages.subcategory.edit_subcategory', compact('subcategory'));
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
            'subcategoryname' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        $subcategory = subcategory::find($id);
        $subcategory->subcategoryname = $request->subcategoryname;
        $subcategory->save();
        //  return redirect()->action([subcategoryController::class,'index']);
        // return back()->with('success','subCategory Updated Successfully');
        return redirect()->route('subcategory.index')->with('success', 'SubCategory Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = subcategory::find($id);
        $subcategory->flag = 0;
        $subcategory->save();

        return redirect()->route('subcategory.index')->with('error', 'SubCategory Deleted successfully.');
    }
}
