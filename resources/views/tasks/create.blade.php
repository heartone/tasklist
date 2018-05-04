@extends('layouts.app')

@section('content')

    <h1>タスク追加</h1>
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
        <div class="form-group">
        {!! Form::label('content', 'タスク') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('追加',  ['class' => 'btn btn-success']) !!}
    
    {!! Form::close() !!}

@endsection