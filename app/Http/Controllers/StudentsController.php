<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Reg;
use Illuminate\Http\Request;


class StudentsController extends Controller
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
        $users = User:: paginate(4);
        return view('students.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies =null;
        if(!$company_id){
            $companies = Company::where('user_id',Auth::user()->id)->get();
        }
            return view ('projects.create',['company_id'=>$company_id,'companies'=>$companies]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newdept = user:: create([
            'name'=>$request->input('name'),
            'faculty_id'=>$request->input('faculty_id')
        ]);

        if($newFaculty){
            return redirect()->route('faculties.show',['newFaculty'=>$newFaculty->id])
            ->with('success','Faculty created successfully');
        }
   
    return back()->withInput()->with('errors','Error occured, Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User ::find($id);
            $courses = $user->regs;
            if(count($courses)>0){
               foreach ($courses as $course) {
                    $status = $course->status;
                    $courseOffered =$course->courses;
                }
                $courses=json_decode($courseOffered,true);
                $courseInfo = Course::find($courses);
            }else if(count($courses)==0){
                $status = null;
                $courseOffered = null;
                $courseInfo = null;
            }
        return view('students.show',['user'=>$user,'status'=>$status,'courseInfo'=>$courseInfo]);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $faculty= Faculty ::find($faculty->id);
        return view('faculties.edit',['faculty'=>$faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        
        $newUpdate = Faculty::where('id',$faculty->id)
        ->update([
            'name'=>$request->input('name')
        ]);

        if($newUpdate){
            return redirect()->route('faculties.show',['faculties'=>$faculty->id])
            ->with('success','Faculty updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $findCompany= Company ::find($company->id);

        if($findCompany->delete()){
            return redirect()->route('companies.index')
            ->with('success','Company deleted successfully');
        }
        //redirect
        return back()->withInput()->with('error','Company could not be deleted');
    }

    public function updateStat($val){
        $user= user ::find($val);
        $statUpdate = Reg::where('user_id',$val)
        ->update([
            'status'=>'Approved'
        ]);

        if($statUpdate){
            return redirect()->route('students.show',['user'=>$user])
            ->with('success','Approved successfully');
        }
        //redirect
        return back()->withInput();
    }
}
