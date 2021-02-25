<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Status;

class TasksController extends Controller
{
    public function index(){
        $tasks = Task::get();
        $statuses = Status::get();
        return view("pages.tasks.index", compact(["tasks", "statuses"]));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $tasks = Task::query()->where('title', 'LIKE', "%{$search}%")->get();
        $statuses = Status::get();
        return view('pages.tasks.index', compact(["tasks", "statuses"]));
    }

  	public function change(Request $request, $id){
  		$task = Task::find($id);
  		$task->status_id = $request->status_id;
  		$task->save();
  		return ["success"=>true];
  	}

    public function ajax(Request $request){
      dd($request->all());
    }

  	public function more($id){
  		$task = Task::find($id);
  		return view("pages.tasks.more", compact(["task"]));
  	}
}
