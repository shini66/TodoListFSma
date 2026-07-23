<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use App\Models\Manager;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ManagerController extends Controller
{
    public function index(): View
    {
        $managers = Manager::withCount('tasks')->get();

        return view('managers.index', compact('managers'));
    }

    public function create(): View
    {
        return view('managers.create');
    }

    public function store(ManagerRequest $request): RedirectResponse
    {
        Manager::create($request->validated());

        return redirect()->route('managers.index')->with('status', 'Manager creado correctamente.');
    }

    public function show(string $id): View
    {
        $manager = Manager::with('tasks')->withCount('tasks')->findOrFail($id);

        return view('managers.show', compact('manager'));
    }

    public function edit(string $id): View
    {
        $manager = Manager::findOrFail($id);

        return view('managers.edit', compact('manager'));
    }

    public function update(ManagerRequest $request, string $id): RedirectResponse
    {
        $manager = Manager::findOrFail($id);

        $manager->update($request->validated());

        return redirect()->route('managers.index')->with('status', 'Manager actualizado correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $manager = Manager::findOrFail($id);

        $manager->delete();

        return redirect()->route('managers.index')->with('status', 'Manager eliminado correctamente.');
    }
}
