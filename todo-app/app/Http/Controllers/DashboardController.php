<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();

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
            'due_date' => '',
            'status' => 'required',
        ]);

        Task::create([
            'GUID' => Str::uuid(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
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

    public function markAsDone($GUID)
    {
        $task = Task::where('GUID', $GUID)->first();

        $task->update([
            'status' => 'completed',
        ]);

        return redirect()->route('dashboard');
    }
}
