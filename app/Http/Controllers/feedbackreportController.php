<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class feedbackreportController extends Controller
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

                $feedback = DB::table('contacts')->get();
                return view('Admin.pages.feedback.feedback', compact('feedback'));
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
    public function searchf(Request $request)
    {
        $s = $request->search;

        $result =  DB::table('contacts')->where('contacts.name', 'LIKE', '%' . $s . '%')->select()->get()->toArray();

        $html = '<div class="container feedback">
    
           <table class="table table-bordered" id="feedbackr">
           
           <thead>
           <tr>
           <th>Name</th>
           <th>Email</th>
           <th>Subjects</th>
           <th>message</th>
           </tr>
           </thead><tbody>';

        foreach ($result as $dta) {
            $html .= ' 
         <tr>
        <td>' . $dta->name . '</td>
            <td>' . $dta->email . '</td>
            <td>' . $dta->subject . '</td>
            <td>' . $dta->message . '</td>
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
