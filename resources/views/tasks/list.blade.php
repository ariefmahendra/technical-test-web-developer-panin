@extends('layouts.app')
@section('content')
    <div class="flex justify-center mb-5">
        <h1 class="text-3xl font-semibold">LIST TASK</h1>
    </div>
    <div class="relative flex flex-col w-auto h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
            <tr >
                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                    <p class="block font-sans text-m  font-normal text-blue-gray-900 opacity-70">
                        Title
                    </p>
                </th>
                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                    <p class="block font-sans text-m  font-normal text-blue-gray-900 opacity-70">
                       Status
                    </p>
                </th>
                <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                    <p class="block font-sans text-m font-normal text-blue-gray-900 opacity-70">
                        Action
                    </p>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $t)
            <tr class="hover:bg-gray-100">
                <td class="p-4 border-b border-blue-gray-50">
                    <p class="block font-sans text-sm font-normal text-blue-gray-900">
                      {{ $t->title }}
                    </p>
                </td>
                @if($t->status == 0)
                <td class="p-4 border-b border-blue-gray-50">
                    <p class="block font-sans text-sm font-normal text-blue-gray-900"> uncheck
                    </p>
                </td>
                @else
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm font-normal text-blue-gray-900"> checked
                        </p>
                    </td>
                @endif
                <td class="p-4 border-b border-blue-gray-50 flex">
                    <a href="/tasks/{{ $t->id }}" class="mx-2  block font-sans text-sm font-medium text-blue-gray-900 hover:text-red-500 focus:text-red-500 focus:outline-none">
                        View
                    </a>
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
            <div>
                <p>Page {{$currentPage}} of {{$totalPage}}</p>
            </div>
            <div>
            <button class="mx-2">
                <a href="/tasks?page={{$previousPage}}&size=5" class="mx-2">
                    Previous
                </a>
            </button>
                @if($currentPage < $totalPage)
                    <button class="mx-2">
                        <a href="/tasks?page={{$nextPage}}&size=5" class="mx-2">
                            Next
                        </a>
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection
