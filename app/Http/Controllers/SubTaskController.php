<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubTaskRequest;
use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        return view('SupTask.create',compact(['task']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubTaskRequest $request)
    {
        subTask::create($request->validated());
        return redirect()->back()->with('success','created suptask sucssasfully');        
    }

}
