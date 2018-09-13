@extends('layouts.app')

@section("content")
  <div class="container">
    <a href="{{ route('lectures.index') }}">
      ◄ Grįžti atgal į Įvertinimų sąrašą
    </a>
    <h1>Įvertinimo redagavimas</h1>
    <!-- Klaidų išvedimas pagal laravelio validatorių -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--  -->
  <form method="POST" action="{{ route('grades.update', $grade->id) }}">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-xl-3 col-md-4">
            <label>Paskaita</label>
            <select class="form-control" name="lecture_id">
              @foreach($lectures as $lecture)
              @if($grade->lecture_id==$lecture->id)
                <option value="{{ $lecture->id }}" selected>{{ $lecture->name }}</option>
              @else
                <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
              @endif
              @endforeach
            </select>
      </div>
      <div class="col-xl-3 col-md-4">
            <label>Studentas</label>
            <select class="form-control" name="student_id">
              @foreach($students as $student)
              @if($grade->student_id==$student->id)
                <option value="{{ $student->id }}" selected>{{ $student->name . " " . $student->surname }}</option>
              @else
                <option value="{{ $student->id }}">{{ $student->name . " " . $student->surname }}</option>
              @endif
              @endforeach
            </select>
      </div>
      <div class="col-xl-3 col-md-2">
            <label>Įvertinimas</label>
            <select class="form-control" name="grade">
              @for($i = 0; $i <=10; $i++)
              @if($grade->grade==$i)
                <option value="{{ $i }}" selected>{{ $i }}</option>
              @else
                <option value="{{ $i }}">{{ $i }}</option>
              @endif
              @endfor
            </select>
      </div>
      <div class="col-xl-3 col-md-2">
        <div>#</div>
        <input type="submit" class="btn btn-lg btn-success" value="Išsaugoti">
      </div>
    </div>
  </form>
  </div>
@endsection
