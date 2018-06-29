<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\CreateTaskRequest;
use Auth;
use User;

class TaskController extends Controller
{
    public function createTask()
    {
    	return view('tasks.index');
    }
    public function storeTask(CreateTaskRequest $request)
    {
    	$data['name'] = $request->name;
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
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
        if (!$task->canDelete()) {
        return redirect('/home');
        }
        $task->delete();
        return back()->with('delete','Bạn Xóa Task Thành Công');
    }
}
