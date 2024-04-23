<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\footer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class footerController extends Controller
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
                $footer = DB::table('footers')->select('id', 'about', 'address', 'phone', 'email')->get();
                return view('Admin.pages.footer.footers', compact('footer'));
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
                return view('Admin.pages.footer.create_footer');
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
            'about' => 'required|regex:/^[\pL\s\-]+$/u',
            'address' => 'required|regex:/^[\pL\s\-]+$/u',
            'phone' => 'required|integer',
            'email' => 'required|email'
        ]);
        $foot = new footer;
        $foot->about = $request->about;
        $foot->address = $request->address;
        $foot->phone = $request->phone;
        $foot->email = $request->email;
        $foot->save();
        return redirect()->route('footers.index')->with('success', 'Footer Added successfully.');
        //  return redirect()->action([footerController::class,'index']);
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
                $footer = footer::find($id);
                return view('Admin.pages.footer.edit_footer', compact('footer'));
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
            'about' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'

        ]);

        $footer = footer::find($id);
        $footer->about = $request->about;
        $footer->address = $request->address;
        $footer->phone = $request->phone;
        $footer->email = $request->email;
        $footer->save();
        return redirect()->route('footers.index')->with('success', 'Footer Updated successfully.');
        // return redirect()->action([footerController::class,'index']);
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
