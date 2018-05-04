@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスク編集</h1>
    
    {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'put']) !!}
    
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content') !!}
        
        {!! Form::submit('更新') !!}
    
    {!! Form::close() !!}

@endsection