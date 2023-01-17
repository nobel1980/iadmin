<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ApiResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return response([ 'students' => ApiResource::collection($students), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'class' => 'required|max:255',
            'subject' => 'required',
            'batch' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $student = Student::create($data);

        return response(['student' => new ApiResource($student), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return response(['Student' => new ApiResource($student), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());

        return response(['Student' => new StudentResource($student), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  sStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $Student->delete();

        return response(['message' => 'Deleted']);
    }

     /*
     @student information
     @ 
    */
    public function student_info(Request $request)
    {

        $stdNo = $request->all();   
        $student = Student::wherestdNo($stdNo)->first(); 
        
        if (!($student)) {
            return response(['message' => 'Student does not exist'], 400);
           }        
   
        $student = json_decode( json_encode($student), true);
        return response(['std_info' => $student], 200);       
    }
}