@extends('layouts.app')

@section('content')
<div class="container">

<div class="col-md-12">
  @if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status')}}</div>
  @endif
</div>


<div class="my-3 p-3 bg-white rounded shadow-sm d-flex justify-content-around align-items-center">
  <h1>Paskaitos</h1>
      <a class="btn btn-success" href="{{ route('lectures.create') }}">
          Pridėti naują paskaitą
      </a>
      <h5>Iš viso įvestų paskaitų: {{ $lectures->count() }}</h5>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm justify-content-around align-items-center">
  <table class="table table-responsive{-sm} table-light">
      <thead><tr><th>Paskaitos pavadinimas</th><th>Paskaitos aprašymas</th><th>Veiksmai</th></tr></thead>
      <tbody>
        @foreach($lectures as $lecture)
        <td><a href="{{ route('lectures.show', $lecture->id) }}">{{ $lecture->name }}</a></td>
        <td>{{ $lecture->description }}</td>
        <td>
          <div class="btn-group" role="group">
            <a class="btn btn-info" href="{{ route('lectures.edit', $lecture->id) }}">Redaguoti</a>
            <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST">
      							{{ csrf_field() }}
      							<input class="btn btn-danger" type="submit" value="X">
      			</form></div></td></tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
