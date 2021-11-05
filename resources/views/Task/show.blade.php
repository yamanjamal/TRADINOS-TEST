@extends('layouts.appmain')
@section('title','Tasks')
@section('content')

<div class="">
    <div class="px-14 py-12 ">
        <div>
            <div class="flex items-center justify-between px-4 py-2  bg-gray-400 mb-4">
                <div>
                    <p class="text-2xl font-bold mt-2 ">Task:</p>
                </div>
                <div class="">
                    <a href="{{ route('SubTask.create',$task->id) }}" class="inline-block px-6 py-2 bg-black no-underline text-white ml-4 rounded-lg">
                        add supTask
                    </a>
                </div>
            </div>
            <div class="px-4 py-4 bg-blue-300 mb-6 ">
                <div>
                    <div class="mb-6">
                         <span class="font-semibold">Description: </span>{{$task->description}}
                    </div>
                    <div class="mb-6">
                         <span class="font-semibold">Flag: </span>{{$task->end_flag}}
                    </div>
                    <div class="mb-6">
                         <span class="font-semibold">Deadline: </span>{{$task->deadline}}
                    </div>
                    <div class="mb-6">
                         <span class="font-semibold">Created Date: </span>{{$task->created_at}}
                    </div>
                    <div class="mb-6">
                         <span class="font-semibold">Task Owner: </span>{{$taskowner->name}}
                    </div>
                    <div class="mb-6">
                         <span class="font-semibold">Assigned to: </span>{{$assignedto->name}}
                    </div>
                    <div class="mb-6 flex">
                        @if (Auth::user()->id == $task->user_id || Auth::user()->role == 'admin')
                            <div>
                                <form action="{{route("Task.delete",$task->id)}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="px-6 py-2 bg-red-900 no-underline text-white ml-4 rounded-lg">
                                        delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="ml-12">
                    <p class="font-bold text-2xl">suptasks:</p>
                    @forelse ($task->SubTasks as $suptask)
                        <div class="bg-green-700 mb-6 px-4 py-3 text-xl">
                             <span class="font-semibold">name: </span>{{$suptask->name}}
                        </div>
                    @empty
                    no tasks yet
                    @endforelse
                </div>
                <div class="ml-12">
                    <p class="font-bold text-2xl">Categories:</p>
                    @forelse ($task->Categories as $Categories)
                        <div class="bg-gray-700 mb-6 px-4 py-3 text-xl" style="background-color:{{$Categories->color}} ;">
                             <span class="font-semibold">name: </span>{{$Categories->name}}
                        </div>
                    @empty
                    no Categories yet
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

