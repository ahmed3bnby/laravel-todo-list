<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('welcome', compact('todos'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        Todo::create($attributes);

        // Set success message for addition
        return redirect('/')->with('success', 'Todo added successfully.');
    }

    public function edit(Todo $todo)
    {
        return view('edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update(['isDone' => true]);

        // You can also set a success message here if needed

        return redirect('/');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        // Set success message for deletion
        return redirect('/')->with('error', 'Todo deleted successfully.');
    }
}
