@extends('layouts.app')

@section("content")
  <div class="container">
    <a href="{{ route('students.index') }}">
      ◄ Grįžti atgal į Studentų sąrašą
    </a>
    <div class="row">
      <div class="col-sm-6">
        <h1>Naujo studento pridėjimas</h1>
        <div class="col-md-12">
          @if (Session::has('status'))
            <div class="alert alert-info">{{ Session::get('status')}}</div>
          @endif
        </div>

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


        <form method="POST" action="{{ route('students.store') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-4">Vardas</div>
            <div class="col-sm-8"><input
              class="form-control" type="text"
              value="{{ old('name') }}" name="name">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">Pavardė</div>
            <div class="col-sm-8"><input
                class="form-control" type="text"
                value="{{ old('surname') }}" name="surname">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">El.paštas</div>
            <div class="col-sm-8"><input
              class="form-control" type="email"
              value="{{ old('email') }}" name="email">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">Tel. nr</div>
            <div class="col-sm-8"><input
              class="form-control" type="text"
              value="{{ old('phone') }}" name="phone">
            </div>
          </div>
                <input type="submit" class="btn btn-success" value="Pridėti studentą">
              </div>
        </form>
      </div>
    </div>
  </div>
@endsection
