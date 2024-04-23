<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\abouts;
use Illuminate\Support\Facades\Auth;

class aboutsController extends Controller
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
                $abouts = DB::table('abouts')->select('id', 'description', 'photo')->where('flag', 1)->get();
                return view('Admin.pages.abouts.about', compact('abouts'));
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
                return view('Admin.pages.abouts.create_about');
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
            'description' => 'required|regex:/^[\pL\s\-]+$/u',
            'photo' => 'required',
        ]);

        $input = $request->all();
        if ($photo = $request->file('photo')) {
            $destinationPath = 'admin/upload/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }
        abouts::create($input);
        return redirect()->route('abouts.index')->with('success', 'About  Added successfully.');
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

                $abouts = abouts::find($id);
                return view('Admin.pages.abouts.edit_about', compact('abouts'));
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

            'description' => 'required',
            'photo' => 'required'
        ]);
        $abouts = abouts::find($id);
        if ($photo = $request->file('photo')) {
            $destinationPath = 'admin/upload/';
            $profileImage = date('ymdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }
        $abouts->photo = $profileImage;
        $abouts->description = $request->description;

        $abouts->save();
        return redirect()->route('abouts.index')->with('success', 'About Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $abouts = abouts::find($id);
        $abouts->flag = 0;
        $abouts->save();
        //return redirect()->route('banners.index');
        return redirect()->route('abouts.index')->with('error', 'About Deleted  successfully.');
    }
}
