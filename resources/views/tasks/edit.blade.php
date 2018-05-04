@extends('layouts.app')

@section('content')

    <h1>id: {{ $task->id }} のタスク編集</h1>
    
    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        <div class="form-group">
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
        </div>
        
        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
    
    {!! Form::close() !!}

@endsection