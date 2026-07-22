<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function show(string $id){
        return response()->json(Task::findOrFail($id));
    }

    public function store(TaskRequest $request){
        $task = Task::create($request->validated());
        return response()->json($task, Response::HTTP_CREATED);
    }

    public function edit(string $id){
        $task = Task::findOrFail($id);
        return response()->json($task, Response::HTTP_OK);
    }

    public function update(TaskRequest $request, string $id){
        $task = Task::findOrFail($id);

        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->completed = $request->get('completed');
        $task->manager_id = $request->get('manager_id');
        $task->save();

        return response()->json($task, Response::HTTP_CREATED);
    }

    public function toggle(string $id){
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();

        return response()->json($task, Response::HTTP_CREATED);
    }

    public function destroy(string $id){
        $task = Task::findOrFail($id);

        if(!$task){
            return response()->json(Response::HTTP_NOT_FOUND);
        }

        $task->delete();
        return response()->json(Response::HTTP_OK);
    }
}
