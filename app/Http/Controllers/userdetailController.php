<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class userdetailController extends Controller
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
                $userss = DB::table('users')->where('role', 0)->get();
                return view('Admin.pages.users.user', compact('userss'));

                $userss = DB::table('users')->get();
                return view('Admin.pages.users.user', compact('userss'));
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
        $user = User::find($id);
        return view('User.pages.userProfile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        $footer = DB::table('footers')->get();
        return view('User.pages.userdetails', compact('users', 'footer'));
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

        $user = User::find($id);

        $input = $request->all();

        $user->update($input);
        // d($input);
        // exidt();

        return redirect()->route('userdetails.edit', ['userdetail' => Auth::user()->id])->with('success', 'Updated Successfully');
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
    public function edit1($id)
    {

        $user = User::find($id);
        return view('Admin.pages.users.edit_user', compact('user'));
    }
    public function update1(Request $request, $id)
    {
        $request->validate([
            'mobile_no' => 'required',
            'street' => 'required',
        ]);

        $user = User::find($id);
        $user->mobile_no = $request->mobile_no;
        $user->street = $request->street;
        $user->save();
        //  return back()->with('success','Category Updated Successfully');
        return redirect()->route('User.pages.userdetails')->with('success', 'Users Updated successfully.');
    }
}
