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
                <p class="text-2xl font-bold mt-2 ">SubTask:</p>
            </div>
        </div>
        <div>
        <form action="{{ route('SubTask.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="flex items-center mb-10">
                <label class="mr-6" >Sub Task:</label>
                    <input type="hidden" name="task_id" value="{{$task->id}}">
                <div class="mr-6">
                    <input type="text" name="name" class="px-6 py-2 bg-gray-200 rounded-full @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <a href="{{ route('Task.show',$task->id) }}" class="no-underline px-6 py-2 bg-black text-white mr-4 rounded-full hover:bg-gray-700">
                        go back
                    </a>
                </div>
                <div>
                    <button type="submit" class="px-6 py-2 bg-blue-500 rounded-full hover:bg-blue-300">
                        Add sup task
                    </button>
                </div>
            </div>
         </form>
         
    </div>
</div>
@endsection

