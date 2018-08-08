<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

     public function login (Request $request) {
        $request['api_token'] = str_random(30);
        $request['password'] = app('hash')->make('password');
        $user = User::create($request->all());

        return response()
                    ->json([
                      'Your token: ' => $user->api_token,
                      'status' => 200
                    ]);
   }



    public function update (Request $request, $id) 
{
     $user = User::find($id);
     $task->update($request->all());

        return response()->json($task);
}

    public function delete ($id) {

        $user = User::find($id);
        $user->delete();
        return response()->json('User Deleted');

}

    public function index() {

        $task = Task::all();
        return response()->json($task);
    }

    public function view ($id) {
        $user = User::find($id);
        return response()->json($user);

    }

}