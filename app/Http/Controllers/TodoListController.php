<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoListController extends Controller
{
    protected $task;

    public function __construct(Task $task){
        $this->task = $task;
    }

    function index() {
        $taskList = $this->task->getTaskList();
        return view('index', compact('taskList'));
    }

    function addTask(Request $request) {
        $data = [
            'task_name' => $request->taskname
        ];

        $this->task->saveTask($data);
        return back();
    }

    function deleteTask($id) {
        $this->task->deleteTask($id);
        return back();
    }

    // get the task
    function updateTask($id) {
        $task = $this->task->getTask($id);
        return view('update-task', compact('task'));
    }

    function saveUpdatedtask(Request $request) {
        $data = [
            'task_name' => $request->updatetask
        ];
        $this->task->updateTask($data, $request->id);
        return redirect()->route('home');
    }

    function doneTask($id) {
        $data = [
            'status' => 'done'
        ];

        $this->task->doneTask($data, $id);
        return back();
    }

    function undoTask($id) {
        $data = [
            'status' => ''
        ];

        $this->task->doneTask($data, $id);
        return back();
    }
}
