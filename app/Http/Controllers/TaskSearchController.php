<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Categories;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskSearchController extends Controller
{


    public function search(SearchRequest $request)
    {
       $tasks=Task::all();
       $categories=Categories::all();

        if($request->search && $request->categorie_id){

            $tasks= Task::whereHas('Categories',function($query) use ($request) {
                return $query->where('categorie_id',$request->categorie_id);
            })->where('description','like','%'.$request->search.'%')->paginate(10);
            return view('Task.index', compact(['tasks','categories']));
        }

        if($request->search){
           $tasks= Task::where('description','like','%'.$request->search.'%')->paginate(10);
            return view('Task.index', compact(['tasks','categories']));
        }

        if($request->categorie_id){
           $tasks= Task::whereHas('Categories',function($query) use ($request) {
                return $query->where('categorie_id',$request->categorie_id);
            })->paginate(10);
            return view('Task.index', compact(['tasks','categories']));
        }

        return view('Task.index', compact(['tasks','categories']));

    }
}
