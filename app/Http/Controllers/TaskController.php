<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(){
        $categories = Category::where("user_id" ,Auth::user()->id )->get();

        $data = [];
        $data["categories"] = $categories;

        return view("create" , $data);
    }

    public function store(Request $req){
        $task = $req->only(["title" , "category_id" , "description" , "due_date"]);
        $task["user_id"] = Auth::user()->id;
        $dbTask = Task::create($task);
        return redirect("/");
    }

    public function edit(Request $req){
        $id = $req->id;

        $task = Task::find($id);
        if(!$task){
            return redirect("/");
        }
        $categories = Category::all();
        $data = [];
        $data["categories"] = $categories;
        $data["task"] = $task;

        return view("edit" , $data);
    }

    public function update(Request $req){
        $data = $req->only(["title" , "category_id" , "description" , "due_date"]);
        $task = Task::find($req->id);

        if(!$task){
            return redirect("");
        } 
        $task->update($data);
        $task->save();
        return redirect("");
    }

    public function updateStatus(Request $req){
        $task = Task::findOrFail($req->taskId);
        $task->is_done = $req->status;
        $task->save();
        return ["success" => true];
    }

    public function delete(Request $req){
        $task = Task::find($req->id);
        if($task){
            $task->delete();
        }

        return redirect("");
    }

    public function show(){
        return view("home");
    }

   
}
