@extends('layouts.app')
@section('content')
    <div class="flex justify-center mb-5">
        <h1 class="text-3xl font-semibold">LOGIN</h1>
    </div>
    @if(session('loginError'))
        <div class=" bg-red-800 text-white p-2 mb-5 rounded max-w-sm mx-auto">
            <p>{{session('loginError')}}</p>
        </div>
    @endif
<form action="/auth/login/post" method="post" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
        <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@mail.com" value="{{old('email')}}" required>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
        <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
</form>
@endsection
