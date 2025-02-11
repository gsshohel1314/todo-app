@extends('layouts.app')

@section('title', 'List')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <!-- Success Message -->
    @if(session('success'))
        <div id="alert-message" class="flex items-start max-sm:flex-col bg-green-100 text-green-800 p-4 rounded-lg relative mb-2" role="alert">
            <div class="flex items-center max-sm:mb-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] fill-green-500 inline mr-3" viewBox="0 0 512 512">
                <ellipse cx="256" cy="256" fill="#32bea6" data-original="#32bea6" rx="256" ry="255.832" />
                <path fill="#fff" d="m235.472 392.08-121.04-94.296 34.416-44.168 74.328 57.904 122.672-177.016 46.032 31.888z"
                  data-original="#ffffff" />
              </svg>
              <strong class="font-bold text-sm">Success!</strong>
            </div>
    
            <span class="block sm:inline text-sm ml-4 mr-8 max-sm:ml-0 max-sm:mt-2">{{ session('success') }}</span>
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-700">To-Do List</h2>
        <a href="{{ route('todos.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Create To-Do
        </a>
    </div>

    <!-- If to do not found-->
    @if ($todos->isEmpty())
        <p class="text-gray-500 text-center">No To-Do items found.</p>
    @else
        <!-- To-Do List Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="p-3 border">Title</th>
                        <th class="p-3 border">Due Date</th>
                        <th class="p-3 border">Email Sent</th>
                        <th class="p-3 border">Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($todos as $todo)
                        <tr class="text-center">
                            <td class="p-3 border">{{ $todo->title }}</td>
                            <td class="p-3 border">{{ \Carbon\Carbon::parse($todo->due_time)->format('d-m-Y h:i A') }}</td>
                            <td class="p-3 border">
                                @if ($todo->is_email_sent)
                                    <span class="px-2 py-0.5 bg-green-600 font-semibold text-white rounded-lg">Yes</span>
                                @else
                                    <span class="px-2 py-0.5 bg-red-600 font-semibold text-white rounded-lg">No</span>
                                @endif
                            </td>
                            <td class="p-3 border flex justify-center space-x-2">
                                <!-- Edit Button -->
                                <a href="{{ route('todos.edit', $todo->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg">Edit</a>
                                
                                <!-- Delete Form -->
                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-lg">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    // Check if the success message is present
    window.onload = function() {
        const successMessage = document.getElementById('alert-message');
        
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.opacity = 0;
                successMessage.style.transition = 'opacity 1s';
                setTimeout(() => successMessage.style.display = 'none', 1000);
            }, 3000); // 3 seconds timeout
        }
    };
</script>

@endsection
