<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('due_date')
            ->get();

        $todayTasks = $tasks->filter(function ($task) {
            return $task->due_date == now()->format('Y-m-d');
        });

        $tomorrowTasks = $tasks->filter(function ($task) {
            return $task->due_date == now()->addDay()->format('Y-m-d');
        });

        $restOfWeekTasks = $tasks->filter(function ($task) {
            return now()->lt(Carbon::parse($task->due_date)->endOfDay()) && now()->endOfWeek()->gte(Carbon::parse($task->due_date));
        });

        return view('dashboard', compact('todayTasks', 'tomorrowTasks', 'restOfWeekTasks'));
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
