@extends('layouts.app')

@section('content')
    <div class="flex justify-end items-center p-4">
        <a href="{{ route('task.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Add Task
        </a>

        <form action="{{ route('logout') }}" method="POST" class="ml-4">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>

   <div class="bg-white rounded-md shadow-md overflow-hidden p-4 mx-auto mt-8 max-w-2xl">
        <table class="min-w-full">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b text-left">Task</th>
            <th class="py-2 px-4 border-b text-left">Description</th>
            <th class="py-2 px-4 border-b text-left">Status</th>
            <th class="py-2 px-4 border-b text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('task.edit', $task->id) }}" class="text-blue-500 hover:underline">
                        {{ $task->title }}
                    </a>
                </td>
                <td class="py-2 px-4 border-b">{{ $task->description }}</td>
                <td class="py-2 px-4 border-b">{{ ucwords(str_replace('_', ' ', $task->status)) }}</td>
                <td class="py-2 px-4 border-b text-center">
                    <a href="{{ route('markAsDone', ['GUID' => $task->GUID]) }}" class="text-green-500 hover:text-green-700">
                        <button class="bg-green-200 text-green-800 py-2 px-4 rounded-full hover:bg-green-300 focus:outline-none focus:shadow-outline-green active:bg-green-400">
                            Done
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
@endsection
