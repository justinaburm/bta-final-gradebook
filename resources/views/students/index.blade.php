@extends('layouts.app')

@section('content')
<div class="container">

<div class="col-md-12">
  @if (Session::has('status'))
    <div class="alert alert-info">{{ Session::get('status')}}</div>
  @endif
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm d-flex justify-content-around align-items-center row">
  <h1>Studentai</h1>
      <a class="btn btn-success" href="{{ route('students.create') }}">
          Pridėti naują studentą
      </a>
      <h5>Iš viso įvestų studentų: {{ $students->count() }}</h5>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm justify-content-around align-items-center">
  <table class="table table-responsive{-sm} table-light">
      <thead><tr><th>Pavardė</th><th>Vardas</th><th>El.paštas</th><th>Tel.nr</th><th>Veiksmai</th></tr></thead>
      <tbody>
        @foreach($students as $student)
        <td><a href="{{ route('students.show', $student->id) }}">{{ $student->surname }}</a></td>
        <td><a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a></td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>
        <td>
          <div class="btn-group" role="group">
            <a class="btn btn-info" href="{{ route('students.edit', $student->id) }}">Redaguoti</a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
      							{{ csrf_field() }}
      							<input class="btn btn-danger" type="submit" value="X">
      			</form></div></td></tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
