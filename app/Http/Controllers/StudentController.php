<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {

        //    dd($request->all());

        $validator = Validator::make($request->all(), [

            'studentName' => 'required|string|max:255',
            'studentEmail' => 'required|email|unique:students,email',
            'studentRelation' => 'required',
            'guardianPhone' => 'required|string',

        ]);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $student = new Student();
        $student->name = $request->studentName;
        $student->email = $request->studentEmail;
        $student->student_relation = $request->studentRelation;
        $student->guardian_phone_number = $request->guardianPhone;
        $student->address = $request->studentAddress;

        $student->save();

        return redirect()->back()->with('success', 'Student Added Successfully');
    }

    public function list()
    {
        $students = Student::all();
        return view('student.list', compact('students'));
    }

    public function destroy($id)
    {

        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect()->back()->with('error', 'Student Deleted Successfully');
        }

        if(!$student){
            return redirect()->back()->with('error', 'No Student Info. Found!');
        }
    }


    public function edit($id)
    {
        $student = Student::find($id);

        if(!$student){
            return redirect()->back()->with('error', 'No Student Info. Found!');
        }

        return view('student.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {

        $student = Student::find($id);

        if(!$student){
            return redirect()->back()->with('error', 'No Student Info. Found!');
        }


        $validator = Validator::make($request->all(), [
            'studentName' => 'required|string|max:255',
            'studentEmail' => 'required|email|unique:students,email',
            'studentRelation' => 'required',
            'guardianPhone' => 'required|string',
            'studentAddress' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $student->name = $request->studentName;
        $student->email = $request->studentEmail;
        $student->student_relation = $request->studentRelation;
        $student->guardian_phone_number = $request->guardianPhone;
        $student->address = $request->studentAddress;

        $student->save();

        return redirect()->route('students.list')->with('success', 'Student Info. Updated Successfully');
    }
}
