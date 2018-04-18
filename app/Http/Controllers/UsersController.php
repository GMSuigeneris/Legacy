<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(count(Auth::user()->regs) != null){
            $courses = Auth::user()->regs;
            foreach ($courses as $course) {
                $status = $course->status;
                $courseOffered =$course->courses;
            }
            $courses=json_decode($courseOffered,true);
            $courseInfo = Course::find($courses);
            return view('users.index',['status'=>$status,'courseInfo'=>$courseInfo]);
        }else{
            return view('users.index',['courseInfo'=>null]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Auth::user()->department->id;
        $level = Auth::user()->level;
        $semester = Auth::user()->semester;
        $courses = Course:: where(['department_id'=>$department,'level'=>$level,'semester'=>$semester])->get();
        return view('users.create',['courses'=>$courses]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User ::find($id);
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //save data
        $companyUpdate = Company::where('id',$company->id)
        ->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]);

        if($companyUpdate){
            return redirect()->route('companies.show',['companies'=>$company->id])
            ->with('success','Company updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
