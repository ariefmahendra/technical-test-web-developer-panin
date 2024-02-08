@extends('layouts.app')
@section('content')
    <div class="flex justify-center mb-5">
        <h1 class="text-3xl font-semibold">CREATE TASK</h1>
    </div>
    <form action="/tasks/{{ $id }}/update/store" method="POST" class="max-w-m mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Your Description</label>
            <label>
                <textarea name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 max-h-56 min-h-56" required></textarea>
            </label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Update
        </button>
    </form>
@endsection

