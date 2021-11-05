@extends('layouts.appmain')
@section('title','Tasks')
@section('content')

<div class="">
    @include('Task.search', ['categories' => $categories])
    <div class="px-14 py-12 ">
        <div class="flex items-center justify-between px-4 py-2  bg-gray-400 mb-4">
            <div>
                <p class="text-2xl font-bold mt-2 ">Tasks:</p>
            </div>
            <div class="">
                <a href="{{ route('Task.create') }}" class="inline-block px-6 py-2 bg-black no-underline text-white ml-4 rounded-lg">
                    create Task
                </a>
            </div>
        </div>
        <div>
            @forelse ($tasks as $task)
                @if (Auth::user()->id == $task->user_id || Auth::user()->role == 'admin' ||Auth::user()->id == $task->assign)
                    <p class="font-bold text-xl">task {{$task->id}}:</p>
                    <div class="px-4 py-4 bg-blue-300 mb-6 ">
                        <div class="mb-6">
                             <span class="font-semibold">Description: </span>{{$task->description}}
                        </div>
                        <div class="mb-6">
                             <span class="font-semibold">Flag: </span>{{$task->end_flag}}
                        </div>

                        <div class="mb-6">
                             <span class="font-semibold">Deadline: </span>{{$task->deadline}}
                        </div>
                        <div class="mb-6 flex">
                            <div>
                                <a href="{{route("Task.edit",$task->id)}}" type="submit" class="px-6 py-2 bg-black no-underline text-white ml-4 rounded-lg">
                                    edit
                                </a>
                            </div>
                            <div>
                                <a href="{{route("Task.show",$task->id)}}" type="submit" class="px-6 py-2 bg-black no-underline text-white ml-4 rounded-lg">show
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                no tasks yet
            @endforelse
        </div>
    </div>
</div>


@endsection

