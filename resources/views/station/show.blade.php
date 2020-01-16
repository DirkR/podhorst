@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{$station->label}}
        </div>
        <div class="card-body">
            <p class="card-text">{{$station->description}}</p>
            <ul>
                @foreach($station->shows as $show)
                    <li><a href="/shows/{{$show->id}}">{{$show->label}}</a></li>
                @endforeach
            </ul>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endsection
