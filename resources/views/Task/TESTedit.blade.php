@extends('layouts.appmain')

@section('content')
<div class="container">
    @if(Session::has('success'))
        <div class="text-center alert alert-success">
            <b >updated seccessfuly</b>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center" style="font-size: 30px;"><b>Edit Task</b></div>
                <div class="card-body">
                    <form method="POST" action="{{route("Task.update",$task->id )}}">
                        @csrf

                        <div class="form-group row mb-4">

                            <label for="name" class="col-md-4 col-form-label text-md-right">description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control " name="description" value="{{ $task->description }}"  required autofocus autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">deadline</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control " name="deadline" value="{{ $task->deadline }}"  autocomplete="off">
                            </div>
                        </div>
                        @if(isset($categories))
                         <label for="email" class="col-md-4 col-form-label text-md-right font-bold ">categories:</label>
                            <select class="form-select" multiple>
                                @foreach ($categories as $cat)
                                    <option selected>Open this select menu</option>
                                    <option value="1">{{$cat->name }}</option>
                                @endforeach
                            </select>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{-- <a   href="{{route('Task.index')}}" class="btn btn-dark" >
                                    back
                                </a> --}}
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check"></i> update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
