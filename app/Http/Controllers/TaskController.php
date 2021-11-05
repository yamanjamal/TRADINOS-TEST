<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;
use App\Models\Categories;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::where('id','!=',Auth::user()->id)->get();
        $categories=Categories::all();


        return view('Task.create',compact(['users','categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        // return $request->assign;

        $task= Task::create($request->validated()+ [
            'assign'=>$request->assign ,
            'user_id'=>Auth::user()->id ,
        ]);
        $task->Categories()->attach($request->categories);

        $categories=Categories::all();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load('SubTasks','Categories');
        $taskowner=User::where('id',$task->user_id)->first();
        $assignedto=User::where('id',$task->assign)->first();

        return view('Task.show', compact(['task','taskowner','assignedto']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $categories=Categories::all();
        $users=User::where('id','!=',Auth::user()->id)->get();
        return view('Task.edit', compact(['task','categories','users']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->Categories()->sync($request->categories);
        return redirect()->back()->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if ($task->user_id == Auth::id() || Auth::user()->role == 'admin') {

            $task->delete();
            return redirect()->route('Task.index');
        }
        return 'you cant delete task you didnt make';
    }
}
