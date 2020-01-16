@extends('layout.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>show</th>
            <th>label</th>
            <th>description</th>
            <th> &nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($episodes as $episode)
            <tr>
                <td><a href="/shows/{{$episode->show->id}}">{{$episode->show->label}}</a></td>
                <td><a href="/episodes/{{$episode->id}}">{{$episode->label}}</a></td>
                <td> {{$episode->description}} </td>
        @endforeach
        </tbody>
    </table>
@endsection
