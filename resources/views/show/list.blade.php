@extends('layout.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>station</th>
            <th>label</th>
            <th>description</th>
            <th> &nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shows as $show)
            <tr>
                <td><a href="/stations/{{$show->station->id}}">{{$show->station->label}}</a></td>
                <td><a href="/shows/{{$show->id}}">{{$show->label}}</a></td>
                <td> {{$show->description}} </td>
        @endforeach
        </tbody>
    </table>
@endsection
