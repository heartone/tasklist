@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            @foreach ($tasks as $task)
            <tr>
                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                <td class="text-muted">{{ $task->created_at }}</td>
                <td>{{ $task->content }}</td>
                <td>
                    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                        {!! Form::submit('x', ['class' => 'btn btn-xs btn-link']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            
        </table>
        
    @endif
    
    {!! link_to_route('tasks.create', 'タスク追加', null, ['class' => 'btn btn-default']) !!}

@endsection