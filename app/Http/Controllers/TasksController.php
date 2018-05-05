<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            $tasks = Task::all();
            return view('tasks.index', [
                'tasks' => $tasks,
            ]);
        } else {
            return view('auth.login');
        }
        
    }
    
    public function show($id) 
    {
        $task = Task::find($id);
        return view('tasks.show', [
            'task' => $task,
        ]);
    }
    
    public function create()
    {
        $task = new Task;
        return view('tasks.create', [
           'task' => $task, 
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',    
        ]);
        
        $task = new Task;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }
    
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',    
        ]);
        
        $task = Task::find($id);
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return redirect('/');
    }
}
