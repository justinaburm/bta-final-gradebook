@extends('layouts.app')

@section('content')
  <div class="container">

    <a href="{{ route('lectures.index') }}">
      ◄ Grįžti atgal į Paskaitų sąrašą
    </a>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
      <h1>
        Paskaita: {{ $lecture->name }}
      </h1>
    </div>
    <hr>
    <div class ="my-3 p-3 bg-white rounder shadow-sm">
      <h2 class="border-bottom border-gray pb-2 mb-0">
        Įvertinimų: {{ $lecture->grades->count() }}
      </h2>
      @if(count($lecture->grades) > 0)
        <table class="table table-responsive{-sm} table-light">
            <thead><tr><th>Studentas</th><th>Įvertinimas</th><th>Data</th></tr></thead>
            <tbody>
              @foreach($lecture->grades as $grade)
              <tr>
                <td><a href="{{ route('students.show', $grade->student->id) }}">{{ $grade->student->name . " " . $grade->student->surname}}</a></td>
                <td>{{ $grade->grade}}</td>
                <td>{{ $grade->created_at}}</td>
            </tr>
            @endforeach
            @endif
        </div>




@endsection
