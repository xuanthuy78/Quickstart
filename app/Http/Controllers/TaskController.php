<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\CreateTaskRequest;

class TaskController extends Controller
{
    public function createTask()
    {
    	return view('tasks.index');
    }
    public function storeTask(CreateTaskRequest $request)
    {
    	$data['name'] = $request->name;
    	$task = Task::create($data);
    	return back()->with('success','Bạn Thêm Task Thành Công');
    }
    public function showTask()
    {
    	$tasks = Task::all();
    	return view('tasks.index',compact('tasks'));
    }
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return back()->with('delete','Bạn Xóa Task Thành Công');
    }
}
