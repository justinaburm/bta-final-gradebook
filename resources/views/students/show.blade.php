@extends('layouts.app')

@section('content')
  <div class="container">

    <a href="{{ route('students.index') }}">
      ◄ Grįžti atgal į Studentų sąrašą
    </a>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h1>
        Studentas: {{ $student->name . " " . $student->surname }}
      </h1>
    </div>
    <hr>
    <div class ="my-3 p-3 bg-white rounder shadow-sm">
      <h2 class="border-bottom border-gray pb-2 mb-0">
        Įvertinimų: {{ $student->grades->count() }}
      </h2>
      @if(count($student->grades) > 0)
        <table class="table table-responsive{-sm} table-light">
            <thead><tr><th>Paskaita</th><th>Įvertinimas</th><th>Data</th></tr></thead>
            <tbody>
              @foreach($student->grades as $grade)
              <tr>
                <td><a href="{{ route('lectures.show', $grade->lecture->id)}}">{{ $grade->lecture->name }}</a></td>
                <td>{{ $grade->grade}}</td>
                <td>{{ $grade->created_at}}</td>
            </tr>
            @endforeach
            @endif
        </div>




@endsection
