<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class FacultiesController extends Controller
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
        $faculties = Faculty:: paginate(4);
        return view('faculties.index',['faculties'=>$faculties]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'faculty' => 'required|min:6'
        ]);

            $newFaculty = Faculty:: create([
                'name'=>$request->input('faculty')
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
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        $faculty= Faculty ::find($faculty->id);
        return view('faculties.show',['faculty'=>$faculty]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        $faculty= Faculty ::find($faculty->id);
        return view('faculties.edit',['faculty'=>$faculty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
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
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $findFaculty= Faculty ::find($faculty->id);

        if($findFaculty->delete()){
            return redirect()->route('faculties.index')
            ->with('success','Faculty deleted successfully');
        }
        //redirect
        return back()->withInput()->with('error','Faculty could not be deleted');
    }
}
