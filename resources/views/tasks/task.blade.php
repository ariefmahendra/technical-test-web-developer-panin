@extends('layouts.app')
@section('content')
    <div class="flex justify-center mb-5">
        <h1 class="text-3xl font-semibold">TASK</h1>
    </div>
    <div class="flex justify-center m-5 ">
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$todo->title}}</h5>
        <p class="font-normal text-gray-700">
        {{$todo->description}}
        </p>
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-2 py-1 mt-2 text-center">
            <a href="/tasks/{{ $todo->id }}/update" class="font-normal">
                Edit
            </a>
        </button>
    </div>
@endsection
