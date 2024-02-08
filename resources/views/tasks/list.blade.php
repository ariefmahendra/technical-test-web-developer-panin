@extends('layouts.app')
@section('content')
    <div class="flex justify-center mb-5">
        <h1 class="text-3xl font-semibold">LIST TASK</h1>
    </div>
    @if($tasks->count() > 0)
    <div class="flex justify-center">
        <div class="text-gray-700 bg-white shadow-md rounded-lg w-max">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                        Title
                    </th>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                           Status
                    </th>
                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase flex justify-center">
                            Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $t)
                <tr class="hover:bg-gray-100">
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="mx-2 block font-sans text-sm font-medium text-blue-gray-900">
                          {{ $t->title }}
                        </p>
                    </td>
                    @if($t->status == 0)
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="mx-2 block font-sans text-sm font-medium text-blue-gray-900"> On Progress
                        </p>
                    </td>
                    @else
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="mx-2 block font-sans text-sm font-medium text-blue-gray-900"> Completed
                            </p>
                        </td>
                    @endif
                    <td class="p-4 border-b border-blue-gray-50 flex justify-around">
                        @if($t -> status == 0)
                            <form action="/tasks/{{ $t->id }}/check/{{ $t->status }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mx-2 block font-sans text-sm font-medium text-blue-gray-900 hover:text-red-500 focus:text-red-500 focus:outline-none">
                                    Checklist
                                </button>
                            </form>
                        @else
                            <form action="/tasks/{{ $t->id }}/check/{{ $t->status }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="mx-2 block font-sans text-sm font-medium  text-blue-gray-900 hover:text-red-500 focus:text-red-500 focus:outline-none">
                                    Unchecklist
                                </button>
                            </form>
                        @endif
                        <a href="/tasks/{{ $t->id }}" class="mx-2  block font-sans text-sm font-medium text-blue-gray-900 hover:text-red-500 focus:text-red-500 focus:outline-none">
                            View
                        </a>
                        <a href="/tasks/{{ $t->id }}/update" class="mx-2  block font-sans text-sm font-medium text-blue-gray-900 hover:text-red-500 focus:text-red-500 focus:outline-none">
                            Edit
                        </a>
                        <form action="/tasks/{{ $t->id }}/delete" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="mx-2 block font-sans text-sm font-medium text-blue-gray-900 hover:text-red-500 focus:text-red-500 focus:outline-none">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="flex justify-between p-5">
                <div class="flex m-1">
                    <p>Page {{$currentPage}} of {{$totalPage}}</p>
                    <p class="ml-1">Total : {{$totalRows}} tasks </p>
                </div>
                <div>
                    @if($currentPage > 1)
                        <button class="hover:bg-gray-100 rounded hover:border-gray-300 border-2 m-1">
                            <a href="/tasks?page={{$previousPage}}&size=5" class="mx-2">
                                Previous
                            </a>
                        </button>
                    @endif
                    @if($currentPage < $totalPage)
                        <button class="hover:bg-gray-100 rounded hover:border-gray-300 border-2 m-1">
                            <a href="/tasks?page={{$nextPage}}&size=5" class="mx-2">
                                Next
                            </a>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
        <p class="flex justify-center ">No data</p>
    @endif

@endsection
