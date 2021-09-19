<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Validator;


class StudentController extends Controller
{
    public function student(){
        $student = Student::all();
        return response()->json([
            "status" => 200,
            "student" => $student
        ]);
    }

    public function add(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'course'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'validerror' => $validator->messages(),
            ]);
        }
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->course = $request->course;
        $student->save();
        return response()->json([
            'status' => 200,
            'message' => "Submit Successfully"
        ]);
    }

    public function edit($id){
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student
        ]);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'course'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'validerror' => $validator->messages(),
            ]);
        }
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->course = $request->course;
        $student->update();
        return response()->json([
            'status' => 200,
            'student' => $student
        ]);
    }

    public function delete($id){
        $student = Student::find($id);
        $student->delete($id);
        return response()->json([
            'status' => 200,
            'message' => "Successfully Delete"
        ]);
    }
}
