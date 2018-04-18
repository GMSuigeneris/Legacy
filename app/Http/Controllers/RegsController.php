<?php

namespace App\Http\Controllers;

use App\Reg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      
        $save = $request->input('test');
        $coursesOffered = json_encode($save);
        if(Auth::check()){
            $reg = Reg:: create([
                'level'=>$request->input('level'),
                'semester'=>$request->input('semester'),
                'user_id'=>$request->user()->id,
                'courses'=>$coursesOffered
            ]);

            if($reg){
                return redirect()->route('users.index')
                ->with('success','Courses registered successfully...Awaiting Approval');
            }
        }
        return back()->withInput()->with('errors','Error occured, Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function show(Reg $reg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function edit(Reg $reg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reg $reg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reg  $reg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reg $reg)
    {
        //
    }
}
