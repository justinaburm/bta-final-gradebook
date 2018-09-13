<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Lecture;
use App\Grade;
use App\Student;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::orderBy('name', "ASC")->get();

        return view("lectures.index", ["lectures" => $lectures]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'lectures.create' );
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
          'name.required' => "Paskaitos pavadinimas yra privalomas."
        ];
        $validatedData = $request->validate([
          'name' => 'required'], $messages);

        $lectures = new Lecture;
        $lectures->name = $request->name;
        $lectures->description = $request->description;
        $lectures->save();

        Session::flash( 'status', 'Paskaita sėkmingai sukurta.' );
        return redirect()->route( 'lectures.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $lecture = Lecture::find($id);

        if ($lecture) {
          Session::flash( 'status', 'Paskaita sėkmingai atnaujinta.' );
          return view('lectures.show', ["lecture" => $lecture]);
        } else {
          return redirect()->route('lectures.index');
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
        $lecture = Lecture::find($id);
        return view ('lectures.edit', ['lecture' => $lecture]);
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
      $messages = [
        'name.required' => "Paskaitos pavadinimas yra privalomas."
      ];
      $validatedData = $request->validate([
        'name' => 'required'], $messages);
        //
        $lecture = Lecture::find($id);
        $lecture->name = $request->name;
        $lecture->description = $request->description;;
        $lecture->save();

        return redirect()->route('lectures.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecture::find($id);
        $lecture->delete();
        Session::flash( 'status', 'Paskaita sėkmingai ištrinta.' );
        return redirect()->route('lectures.index');
    }
}
