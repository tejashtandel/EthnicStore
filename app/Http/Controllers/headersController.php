<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\headers;
use Illuminate\Support\Facades\DB;

class headersController extends Controller
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

                $head = DB::table('headers')->select('id', 'header_name')->where('flag', 1)->get();
                return view('Admin.pages.header.headers', compact('head'));
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
                return view('Admin.pages.header.create_headers');
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
            'header_name' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);
        $head = new headers;
        $head->header_name = $request->header_name;

        $head->save();
        return redirect()->route('header.index')->with('success', 'Header Added successfully.');
        // return redirect()->action([headersController::class,'index']);
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
                $header = headers::find($id);
                return view('Admin.pages.header.edit_headers', compact('header'));
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
            'header_name' => 'required'
        ]);

        $header = headers::find($id);
        $header->header_name = $request->header_name;
        $header->save();
        return redirect()->route('header.index')->with('success', 'Header Updated successfully.');
        //return redirect()->action([headersController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $header = headers::find($id);
        $header->flag = 0;
        $header->save();
        // return redirect()->action([headersController::class,'index']);
        return redirect()->route('header.index')->with('error', 'Header Deleted successfully.');
    }
}
