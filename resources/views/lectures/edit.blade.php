@extends('layouts.app')

@section("content")
  <div class="container">
    <a href="{{ route('lectures.index') }}">
      ◄ Grįžti atgal į Paskaitų sąrašą
    </a>
    <div class="row">
      <div class="col-sm-6">
        <h1>Naujos paskaitos įdėjimas</h1>

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


        <form method="POST" action="{{ route('lectures.update', $lecture->id) }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-sm-4">
            Paskaitos redagavimas
            </div>
          <div class="col-sm-8">
            <input
              class="form-control"
              type="text"
              value="{{ $lecture->name }}"
              name="name">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              Paskaitos aprašymas
            </div>
            <div class="col-sm-8">
              <input
                class="form-control"
                type="text"
                value="{{ $lecture->description }}"
                name="description">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">

                <input type="submit" class="btn btn-success" value="Pridėti naują paskaitą">
              </div></div>
        </form>
      </div>
    </div>
  </div>
@endsection
