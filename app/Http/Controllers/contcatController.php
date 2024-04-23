<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class contcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->role == '0') {
        $footer = DB::table('footers')->get();
        return view('User.pages/contactus', compact('footer'));
    } else {
        return "login again";
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
        $request->validate([
            'userid' => 'required',
            'name' => 'required',
            'message' => 'required',
            'email' => 'required ',
            'subject' => 'required ',
        ]);

        $userid = $request->userid;
        $name = $request->name;
        $message = $request->message;
        $email = $request->email;
        $subject = $request->subject;

        contact::create(['userid' => $userid, 'name' => $name, 'message' => $message, 'email' => $email,'subject' => $subject]);
        $footer = DB::table('footers')->get();
        return view('User.pages/contactus', compact('footer'))->with('status','Your Message Sent Succesfully');

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
}
