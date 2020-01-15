@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{$station->label}}
        </div>
        <div class="card-body">
            <p class="card-text">{{$station->description}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endsection
