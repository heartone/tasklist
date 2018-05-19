<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;
use App\User;


class TasksController extends Controller
{
    
    public function index()
    {
        $tasks = [];
        
        if (\Auth::check())
        {
            $tasks = Task::all()->where('user_id', '=', \Auth::user()->id);
            return view('tasks.index', [
                'tasks' => $tasks, 'newtask' => new Task,
            ]);
        } else {
            return redirect('login');
        }
            
        
    }
    
    public function show($id) 
    {
        $task = Task::find($id);
        if ($task->user_id != \Auth::user()->id) {
            return redirect('/');
        }
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
        $task->user_id = \Auth::user()->id;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }
    
    public function edit($id)
    {
        $task = Task::find($id);
        
        if ($task->user_id != \Auth::user()->id) {
            return redirect('/');
        }
        
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
        
        if ($task->user_id != \Auth::user()->id) {
            return redirect('/');
        }
        
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $task = Task::find($id);
        
        if ($task->user_id != \Auth::user()->id) {
            return redirect('/');
        }
        
        $task->delete();
        
        return redirect('/');
    }
}
