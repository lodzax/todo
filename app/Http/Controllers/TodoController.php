<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Todo;
use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;
use Illuminate\Support\Facades\DB;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
       return response()->view('todos.index', [
                    'todos' => Todo::orderBy('created_at', 'desc')->get(),
                ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // insert only requests that already validated in the StoreRequest
        $create = Todo::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Task created successfully!');
            return redirect()->route('todos.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('todos.show', [
            'todo' => Todo::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('todos.form', [
            'todo' => Todo::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $todo = Todo::findOrFail($id);
        $validated = $request->validated();

        $update = $todo->update($validated);

        if($update) {
            session()->flash('notif.success', 'Task updated successfully!');
            return redirect()->route('todos.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $todo = Todo::findOrFail($id);

        $delete = $todo->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Task deleted successfully!');
            return redirect()->route('todos.index');
        }

        return abort(500);
    }


}
