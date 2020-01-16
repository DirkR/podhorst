@extends('layout.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th> label</th>
            <th> description</th>
            <th> &nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stations as $station)
            <tr>
                <td> {{$station->label}} </td>
                <td> {{$station->description}} </td>
                <td>
                    <a href="/stations/{{$station->id}}" type="button" class="btn btn-primary">Show</a>
                </td>
        @endforeach
        </tbody>
    </table>
@endsection
