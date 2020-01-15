@extends('layout.app')

@section('content')
    @foreach($stations as $station)
        {{$station->label}}<br>
    @endforeach
@endsection
