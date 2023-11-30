@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('task.update', $task->id) }}" class="p-4">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Task Title:</label>
        <input type="text" name="title" id="title" class="w-full rounded-md border-gray-300 p-2" value="{{ old('title', $task->title) }}" required>
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Task Description:</label>
        <textarea name="description" id="description" rows="3" class="w-full rounded-md border-gray-300 p-2" required>{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Task Status:</label>
        <select name="status" id="status" class="w-full rounded-md border-gray-300 p-2" required>
            <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <div class="mt-8">
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update Task</button>
    </div>
</form>
<form method="POST" action="{{ route('task.delete', $task->id) }}" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:underline">Delete</button>
    </form>

    
@endsection
