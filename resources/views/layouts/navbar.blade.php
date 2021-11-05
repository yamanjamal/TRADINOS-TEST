<div class="flex justify-between bg-blue-500 py-3 px-6 border boreder-b">
    <div class="px-6 ">
        <ul class="flex">
            <a href="{{ route('Task.index') }}" class="no-underline text-white font-semibold mr-10 text-2xl"><li>Tasks</li></a>
        </ul>
    </div>
    <div>
        <div class="">
            <a class="no-underline text-white font-semibold mr-10 text-2xl" href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}"  method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
