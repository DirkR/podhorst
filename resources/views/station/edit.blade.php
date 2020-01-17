@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Station bearbeiten
        </div>
        <div class="card-body">

            {!! Form::open(['action' => ['StationController@update', $station->id], 'method' => 'put']) !!}
            <div class="form-group row">
                {{ Form::label("label", null, ['class' => 'control-label col-sm-2']) }}
                {{ Form::text("label", $station->label, ['class' => 'form-control col-sm-10']) }}
            </div>
            <div class="form-group row">
                {{ Form::label("description", null, ['class' => 'control-label col-sm-2']) }}
                {{ Form::textarea("description", $station->description, ['class' => 'form-control  col-sm-10', 'rows' => 3]) }}
            </div>
            <div class="form-group row">
                {{ Form::label("slug", null, ['class' => 'control-label col-sm-2']) }}
                {{ Form::text("slug", $station->slug, ['class' => 'form-control  col-sm-10']) }}
            </div>
            <div class="form-group row">
                {{ Form::label("url", null, ['class' => 'control-label col-sm-2']) }}
                {{ Form::text("url", $station->url, ['class' => 'form-control  col-sm-10']) }}
            </div>
            <hr>
            <div class="btn-group" role="group" aria-label="Basic example">
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
