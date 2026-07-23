<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Manager;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::with('manager')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create(): View
    {
        $managers = Manager::all();

        return view('tasks.create', compact('managers'));
    }

    public function show(string $id): View
    {
        $task = Task::with('manager')->findOrFail($id);

        return view('tasks.show', compact('task'));
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $task = Task::create($request->validated());

        return redirect()->route('tasks.index')->with('status', 'Tarea creada correctamente.');
    }

    public function edit(string $id): View
    {
        $task = Task::findOrFail($id);
        $managers = Manager::all();

        return view('tasks.edit', compact('task', 'managers'));
    }

    public function update(TaskRequest $request, string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);

        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('status', 'Tarea actualizada correctamente.');
    }

    public function toggle(string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();

        return redirect()->route('tasks.index')->with('status', 'Tarea completada.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->route('tasks.index')->with('status', 'Tarea eliminada correctamente.');
    }
}
