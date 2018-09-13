@extends('layouts.app')

@section("content")
  <div class="container">
    <a href="{{ route('students.index') }}">
      ◄ Grįžti atgal į Studentų sąrašą
    </a>
    <div class="row">
      <div class="col-sm-6">
        <h1>Studento informacijos redagavimas</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('students.update', $student->id) }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-4">Vardas</div>
            <div class="col-sm-8"><input
              class="form-control" type="text"
              value="{{ $student->name }}" name="name">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">Pavardė</div>
            <div class="col-sm-8"><input
                class="form-control" type="text"
                value="{{ $student->surname }}" name="surname">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">El.paštas</div>
            <div class="col-sm-8"><input
              class="form-control" type="email"
              value="{{ $student->email }}" name="email">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">Tel. nr</div>
            <div class="col-sm-8"><input
              class="form-control" type="text"
              value="{{ $student->phone }}" name="phone">
            </div>
          </div>
                <input type="submit" class="btn btn-success" value="Atnaujinti informaciją">
              </div>
        </form>
      </div>
    </div>
  </div>
@endsection
