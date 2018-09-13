@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="container">
                    <div class="my-3 p-3 bg-white rounded shadow-sm d-flex justify-content-around align-items-center w-100">
                      <h1>Sveiki, {{ Auth::user()->name}}!</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
