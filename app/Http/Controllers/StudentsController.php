<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Grade;
use Session;
use Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('surname', "ASC")->get();

        return view("students.index", ["students" => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('students.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       $messages = [
         'name.required' => "Studento vardas yra privalomas.",
         'surname.required' => "Studento pavardė yra privaloma."
       ];
       $validatedData = $request->validate([
         'name' => 'required',
         'surname' => 'required'
       ], $messages);

         $students = new Student;
         $students->name = $request->name;
         $students->surname = $request->surname;
         $students->email = $request->email;
         $students->phone = $request->phone;
         $students->save();

         Session::flash( 'status', 'Studentas ' . $students->name .' '. $students->surname .' sėkmingai pridėtas į sąrašą.' );
         return redirect()->route('students.create');
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {

       $student = Student::find($id);

         if ($student) {
           return view('students.show', ["student" => $student]);
         } else {
           return redirect()->route('students.index');
         }
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $student = Student::find($id);
         return view( 'students.edit', ['student' => $student]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         //
         $messages = [
           'name.required' => "Studento vardas yra privalomas.",
           'surname.required' => "Studento pavardė yra privaloma."
         ];
         $validatedData = $request->validate([
           'name' => 'required',
           'surname' => 'required'
         ], $messages);

           $student = Student::find($id);
           $student->name = $request->name;
           $student->surname = $request->surname;
           $student->email = $request->email;
           $student->phone = $request->phone;
           $student->save();
           Session::flash( 'status', 'Studento ' . $student->name . ' ' . $student->surname .' informacija sėkmingai atnaujinta.' );
           return redirect()->route('students.create');

         }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $student = Student::find($id);
         $student->delete();
         Session::flash( 'status', 'Studentas '. $student->name . ' ' . $student->surname .' sėkmingai pašalintas.' );
         return redirect()->route('students.index');
     }
 }
