@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細</h1>

    <p>{{ $task->content }}</p>
    
    <div class="row">
        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
            {!! link_to_route('tasks.edit', 'タスク編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!}
        </div>
        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
            {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
        
    </div>
    
    
    

@endsection