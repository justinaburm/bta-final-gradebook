<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Auth;
use App\Lecture;
use App\Student;
use Session;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();

        return view('grades.index', ["grades" => $grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lectures = Lecture::all();
        $students = Student::all();

        return view('grades.create', ["lectures" => $lectures, "students" => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = new Grade();
        $grade->grade = $request->grade;
        $grade->lecture_id = $request->lecture_id;
        $grade->student_id = $request->student_id;
        $grade->save();
        Session::flash( 'status', $grade->student->name . ' ' . $grade->student->surname . ', ' . $grade->lecture->name . ', įvertinimas: ' . $grade->grade . '. Sėkmingai įvesta.');
        return redirect()->route('grades.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        $lectures = Lecture::all();
        $students = Student::all();

        return view('grades.edit', ["grade" => $grade, "lectures" => $lectures, "students" => $students]);
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
        $grade = Grade::find($id);
        $grade->grade = $request->grade;
        $grade->lecture_id = $request->lecture_id;
        $grade->student_id = $request->student_id;
        $grade->save();
        Session::flash( 'status', 'Įvertinimas sėkmingai pakeistas. ' .$grade->student->name . ' ' . $grade->student->surname . ', ' . $grade->lecture->name . ' - ' . $grade->grade);
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        Session::flash( 'status', $grade->student->name . ' ' . $grade->student->surname . ', ' . $grade->lecture->name . ', įvertinimas: ' . $grade->grade . '. Sėkmingai pašalinta.');
        return redirect()->route('grades.index');
    }
}
