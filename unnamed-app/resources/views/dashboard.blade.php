@extends('layouts.app')

@section('content')
    <div class="mx-4">
        <button class="absolute top-0 right-4 bg-blue-500 text-white px-4 py-2 rounded-md">
            <a href="{{ route('task.create') }}"
                class="absolute top-0 right-4 bg-blue-500 text-white px-4 py-2 rounded-md">Add Task</a></button>
        <div class="bg-white rounded-md shadow-md overflow-hidden relative">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Task</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $task->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $task->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
