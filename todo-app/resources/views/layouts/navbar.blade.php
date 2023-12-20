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