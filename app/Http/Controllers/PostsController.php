<?php

namespace App\Http\Controllers;


use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create (Request $request) {
        $task = Task::create($request->all());

        return response()->json($task);
   }


    public function update (Request $request, $id) 

{
        $task = Post::find($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status = $request->input('status');
        $task->assign = $request->input('assign');
        $task->save();

        return response()->json($task);
}

    public function delete ($id) {

        $task = Task::find($id);
        $task->detele();
        return response()->json('Task Deleted');

}

    public function index() {

        $task = Task::all();
        return response()->json($task);
    }

    public function view ($id) {

        $task = Task::find($id);
        return response()->json($task);
    
    }
}