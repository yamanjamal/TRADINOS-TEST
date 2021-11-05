@extends('layouts.appmain')
@section('title','Tasks')
@section('content')


@if(Session::has('success'))
     <div class="text-center alert alert-success">
         <b >{{session::get('success')}}</b>
     </div>
@endif
<div class="">
    <div class="px-14 py-12 ">
        <div class="px-4 py-2  bg-gray-400 mb-4">
            <div>
                <p class="text-2xl font-bold mt-2 ">Task:</p>
            </div>
        </div>
        <div>
        <form action="{{ route('Task.update',$task->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="flex items-center mb-10">
                <label class="mr-6" >Descripiton:</label>
                <div>
                    <input type="text" name="description" value="{{ $task->description }}" class="px-6 py-2 bg-gray-200 rounded-full @error('description') is-invalid @enderror">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center mb-10">
                <label class="mr-6" >Deadline:</label>
                <div>
                    <input type="date" name="deadline" value="{{ \Carbon\Carbon::parse($task->deadline)->format('Y-m-d')}}"
                     class="px-6 py-2 bg-gray-200 rounded-full @error('deadline') is-invalid @enderror" >
                    @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center mb-10">
                <label class="mr-6" >Created Date:</label>
                <div>

                    <input type="date" name="created_at" class="px-6 py-2 bg-gray-200 rounded-full @error('created_at') is-invalid @enderror" value="{{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d')}}">

                    @error('created_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center mb-10">
                <label class="mr-6" >End_flag:</label>
                <div>
                    <select name="end_flag" class=" px-6 py-2 @error('end_flag') is-invalid @enderror">
                        <option value="0"
                            @if ($task->end_flag == 0)
                            selected 
                            @endif
                        >not finished</option>
                        <option value="1"
                            @if ($task->end_flag == 1)
                            selected 
                            @endif
                        >finished</option>
                    </select>
                    @error('end_flag')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center mb-10">
                <label class="mr-6" >Assgin To:</label>
                <div>
                    <select name="assign" @error('assign') is-invalid @enderror >
                    @forelse ($users as $user)
                        <option value="{{$user->id}}" style="background-color: {{$user->color}}"
                            @if ($user->id == $task->assign)
                                selected 
                            @endif
                            >{{$user->name}}
                        </option>
                    @empty
                        no tasks yet
                    @endforelse
                    </select>
                    @error('assgin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center mb-10">
                <label class="mr-6" >categories:</label>
                <div>
                    @forelse ($categories as $categorie)
                        {{$categorie->name}}
                        <input type="checkbox" name="categories[]" class="mr-6" value="{{$categorie->id}}"
                        @foreach ($task->Categories as $task_cat)
                            @if ($categorie->id == $task_cat->id)
                                checked 
                            @endif
                        @endforeach
                        >
                    @empty
                    @endforelse
                    @error('categories')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="mb-10 ">
                <button type="submit" class="px-6 py-2 bg-blue-500 rounded-full hover:bg-blue-300">
                    update task
                </button>
            </div>
         </form>
         
    </div>
</div>

@endsection

