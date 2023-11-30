<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('dashboard', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => '',
            'status' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $request->validate([
            'title' => 'required',
            'description' => '',
            'status' => 'required',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect()->route('dashboard');
    }
}
