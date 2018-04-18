<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\Faculty;
use Illuminate\Http\Request;

class CoursesController extends Controller
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
        $courses = Course:: paginate(4);
        return view('courses.index',['courses'=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dept_id = null)
    {
        if($dept_id){
            $department = Department::findOrFail($dept_id);
            $departments = null;
            $faculties=null;
        }else if($dept_id == null){
            $departments = Department::all();
            $department=null;
            $faculties = Faculty::all();
            
        }
            return view ('courses.create',['department'=>$department,'departments'=>$departments,'faculties'=>$faculties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course:: create([
            'department_id'=>$request->input('department'),
            'faculty_id'=>$request->input('faculty'),
            'name'=>$request->input('name'),
            'semester'=>$request->input('semester'),
            'level'=>$request->input('level'),
            'code'=>$request->input('code')
        ]);

        if($course){
            return redirect()->route('courses.show',['course'=>$course])
            ->with('success','Course created successfully');
        }
   
    return back()->withInput()->with('errors','Error occured, Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course= Course ::find($id);
        return view('courses.show',['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course= Course::find($id);
        return view('courses.edit',['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if($request->input('level')){
            $course = Course::find($id)
            ->update([
                'name'=>$request->input('name'),
                'semester'=>$request->input('semester'),
                'level'=>$request->input('level'),
                'code'=>$request->input('code')
            ]);
        }else{
            $course = Course::find($id)
            ->update([
                'name'=>$request->input('name'),
                'code'=>$request->input('code')
            ]);
        }
       

        if($course){
            return redirect()->route('courses.show',['courses'=>$id])
            ->with('success','Course updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course= Course ::find($id);

        if($course->delete()){
            return redirect()->route('courses.index')
            ->with('success','Course deleted successfully');
        }
        //redirect
        return back()->withInput()->with('error','Course could not be deleted');
    }

}
