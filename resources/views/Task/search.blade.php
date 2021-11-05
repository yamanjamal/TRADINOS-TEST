<div class="bg-blue-500 py-6 px-6 ">
    <div class="">
        <form class="flex items-center" action="    " method="GET">
            @method('GET')
            @csrf
            <label class="mr-2 font-bold text-xl">search:</label>
            <input type="text" name="search" id="" placeholder="search task .." class="py-1 px-2 rounded-lg bg-gray-300">
            <button type="submit" class="px-6 py-2 bg-black no-underline text-white ml-4 rounded-lg">search
            </button>
            <select class=" mx-6" name="categorie_id">
                <option value="{{null}}">all</option>
                @forelse ($categories as $categorie)
                    <option value="{{$categorie->id}}" style="background-color: {{$categorie->color}}">{{$categorie->name}}</option>
                @empty
                @endforelse
            </select>
        </form>
    </div>
</div>