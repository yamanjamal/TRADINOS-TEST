@extends('layout\layout')
@section('title','myUsers')
@section('content')
    <div  class="users_table">
        <h1 class="text-center">myUsers page</h1>

        <table class=" table">
            <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">year</th>
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($movies as $movie)
            <tr>
                <th scope="row">{{$movie->id}}</th>
                <td>{{$movie->title}}</td>
                <td>{{$movie->description}}</td>
                <td>{{$movie->year}}</td>
            </tr>
            @endforeach --}}
            </tbody>
        </table>

    </div>



@endsection

