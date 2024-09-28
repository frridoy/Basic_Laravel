<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(){
        return view('student.create');
    }

    public function store(Request $request){

    //    dd($request->all());

    $student=new Student();
    $student->name=$request->studentName;
    $student->email=$request->studentEmail;
    $student->student_relation=$request->studentRelation;
    $student->guardian_phone_number=$request->guardianPhone;
    $student->address=$request->studentAddress;

    $student->save();

    return redirect()->back();
    }

}
