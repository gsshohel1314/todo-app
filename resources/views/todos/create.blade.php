@extends('layouts.app')

@section('title', 'create')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New To-Do</h2>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="title">Title</label>
            <input type="text" name="title" id="title" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="3"
                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="due_time">Due Date & Time</label>
            <input type="datetime-local" name="due_time" id="due_time" required
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('todos.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg mr-3">Back</a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Create To-Do
            </button>
        </div>
    </form>
</div>
@endsection