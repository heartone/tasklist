@extends('layouts.app')

@section('content')

    <h1>タスク追加</h1>
    {!! Form::model($task, ['route' => 'tasks.store']) !!}
    
        {!! Form::label('content', 'タスク') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('追加') !!}
    
    {!! Form::close() !!}

@endsection