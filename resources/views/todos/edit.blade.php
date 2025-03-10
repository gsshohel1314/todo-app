@extends('layouts.app')

@section('title', 'Edit')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit To-Do</h2>

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $todo->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="due_time">Due Date & Time</label>
            <input type="datetime-local" name="due_time" id="due_time" value="{{ old('due_time', $todo->due_time) }}" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('todos.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg mr-3">Back</a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Update To-Do
            </button>
        </div>
    </form>
</div>
@endsection
