<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Faculty;
use App\Department;
use App\Course;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultyCount = Faculty::all()->count();
        $departmentCount = Department::all()->count();
        $studentCount = User::all()->count();
        $courseCount = Course::all()->count();
        return view('admin',['facultyCount'=>$facultyCount,'departmentCount'=>$departmentCount,'studentCount'=>$studentCount,'courseCount'=>$courseCount]);
    }
}
