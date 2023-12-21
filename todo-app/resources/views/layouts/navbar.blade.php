<div class="flex justify-between items-center bg-gradient-to-r from-teal-400 to-blue-300 text-white p-4 shadow-md">
    <div class="flex items-center">
        <a href="/dashboard" class="mr-2">
            HOME
        </a>
        <div class="text-lg font-semibold capitalize">Welcome, {{ Auth::user()->name }}</div>

    </div>

    <div class="flex items-center">
        <a href="{{ route('task.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Add Task
        </a>

        <form action="{{ route('logout') }}" method="POST" class="ml-4">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</div>
