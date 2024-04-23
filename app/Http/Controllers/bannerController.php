<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class bannerController extends Controller
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
                $bann = DB::table('banners')->select('id', 'banner_image', 'description')->where('flag', 1)->get();
                return view('Admin.pages.banners.banners', compact('bann'));
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
                return view('Admin.pages.banners.create_banners');
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
            'banner_image' => 'required',
            'description' => 'required|regex:/^[\pL\s\-]+$/u',
        ]);

        $input = $request->all();
        if ($banner_image = $request->file('banner_image')) {
            $destinationPath = 'admin/upload/';
            $profileImage = date('YmdHis') . "." . $banner_image->getClientOriginalExtension();
            $banner_image->move($destinationPath, $profileImage);
            $input['banner_image'] = "$profileImage";
        }

        banner::create($input);
        return redirect()->route('banners.index')->with('success', 'Banners Added successfully.');
        //return redirect()->action([bannerController::class,'index']);

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


                $banner = banner::find($id);
                return view('Admin.pages.banners.edit_banner', compact('banner'));
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
            'banner_image' => 'required',
            'description' => 'required',
        ]);
        $banner = banner::find($id);
        if ($banner_image = $request->file('banner_image')) {
            $destinationPath = 'admin/upload/';
            $profileImage = date('ymdHis') . "." . $banner_image->getClientOriginalExtension();
            $banner_image->move($destinationPath, $profileImage);
            $input['banner_image'] = "$profileImage";
        }
        $banner->banner_image = $profileImage;
        $banner->description = $request->description;

        $banner->save();
        return redirect()->route('banners.index')->with('success', 'Banners Updated successfully.');
        // return redirect()->route('banners.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $banner = banner::find($id);
        $banner->flag = 0;
        $banner->save();
        //return redirect()->route('banners.index');
        return redirect()->route('banners.index')->with('error', 'Banners Deleted  successfully.');
    }
}
