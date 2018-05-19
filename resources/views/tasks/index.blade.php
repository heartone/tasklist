@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if ($tasks)
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
    {!! Form::model($newtask, ['route' => 'tasks.store']) !!}
        <div class="form-group">
        {!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'タスクを入力']) !!}
        </div>
        {!! Form::submit('追加',  ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
    

@endsection