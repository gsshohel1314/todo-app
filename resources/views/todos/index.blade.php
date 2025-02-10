@extends('layouts.app')

@section('title', 'List')

@section('content')

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
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
                        <th class="p-3 border">Status</th>
                        <th class="p-3 border">Actions</th>
                    </tr>
                </thead>
                {{-- @dd($todos); --}}
                <tbody>
                    @foreach ($todos as $todo)
                        <tr class="text-center">
                            <td class="p-3 border">{{ $todo->title }}</td>
                            <td class="p-3 border">{{ \Carbon\Carbon::parse($todo->due_time)->format('d-m-Y h:i A') }}</td>
                            <td class="p-3 border">
                                @if ($todo->is_done)
                                    <span class="text-green-600 font-semibold">Completed</span>
                                @else
                                    <span class="text-red-600 font-semibold">Pending</span>
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

@endsection
