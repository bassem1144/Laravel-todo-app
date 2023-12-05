@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center flex-col">
    <form method="POST" action="{{ route('task.store') }}" class="p-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Task Title:</label>
            <input type="text" name="title" id="title" class="w-full rounded-md border-gray-300 p-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Task Description:</label>
            <textarea name="description" id="description" rows="3" class="w-full rounded-md border-gray-300 p-2" required></textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Task Status:</label>
            <select name="status" id="status" class="w-full rounded-md border-gray-300 p-2" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="mt-8">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Create Task</button>
        </div>
    </form>
</div>
    
@endsection
