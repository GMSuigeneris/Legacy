<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');//change to admin
       // $this->middleware('auth',['except'=>['index','home','about']]);//change to admin
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department:: paginate(3);
        return view('departments.index',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($fact_id = null)
    {
        if($fact_id){
            $faculty = Faculty::find($fact_id);
            $faculties = null;
        }else if($fact_id == null){
            $faculties = Faculty::all();
            $faculty=null;
        }
            return view ('departments.create',['faculty'=>$faculty,'faculties'=>$faculties]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = Department:: create([
            'name'=>$request->input('name'),
            'faculty_id'=>$request->input('faculty')
        ]);

        if($department){
            return redirect()->route('departments.show',['department'=>$department->id])
            ->with('success','Department created successfully');
        }
   
    return back()->withInput()->with('errors','Error occured, Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department= Department ::find($department->id);
        return view('departments.show',['department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($department)
    {
        $department= Department ::find($department);
        return view('departments.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id)
        ->update([
            'name'=>$request->input('name')
        ]);

        if($department){
            return redirect()->route('departments.show',['id'=>$id])
            ->with('success','Department updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department= Department ::find($id);

        if($department->delete()){
            return redirect()->route('departments.index')
            ->with('success','Department deleted successfully');
        }
        //redirect
        return back()->withInput()->with('error','Department could not be deleted');
    }
}
