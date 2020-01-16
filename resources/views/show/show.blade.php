@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{$show->label}}
        </div>
        <div class="card-body">
            <p class="card-text">{{$show->description}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endsection
