<nav class="bg-white fixed top-0 left-0 z-20 w-full border-gray-300 border-b-2 px-2 sm:px-4 py-2.5 ">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/tasks" class="flex">
            <img src="{{ asset('img\logo.png') }}" alt="logo" class="size-1/4 mr-2">
            <span class="self-center text-xl font-semibold whitespace-nowrap">Todolist</span>
        </a>
        @auth()
        <div class="flex">
            <div class="hover:bg-gray-100 rounded hover:border-gray-300 border-2 m-1">
                <a href="/tasks" class="flex text-m font-semibold mx-2 text-black">
                    Home
                </a>
            </div>
            <div class="hover:bg-gray-100 rounded hover:border-gray-300 border-2 m-1">
                <a href="/tasks/create" class="flex text-m font-semibold mx-2 text-black">
                    Create Task
                </a>
            </div>
            <form action="/auth/logout" method="post" class="hover:bg-gray-100 rounded hover:border-gray-300 border-2 m-1">
                @csrf
                <button type="submit" class="flex text-m font-semibold mx-2 text-black">
                    Logout
                </button>
            </form>
        </div>
        @else
            <a href="/auth/login" class="flex text-m font-semibold mx-2 text-black">
                login
            </a>
        @endauth
    </div>


</nav>
