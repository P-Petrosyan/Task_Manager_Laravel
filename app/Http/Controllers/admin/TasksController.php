<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Auth;

class TasksController extends Controller
{
  public function index(){
  	$tasks = Task::get();
  	 return view("admin.tasks.index", compact(["tasks"]));
  }

  public function get(){
    $tasks = Task::where("created_by", Auth::id())->get();
    return view("admin.tasks.my", compact(["tasks"]));
  }

	public function create(){
		$tasks= Task::get();
		$users= User::where("is_manager", '0')->get();

		return view("admin.tasks.create", compact(["tasks", "users"]));
	}

	public function store(Request $request){
    $task = new Task();
    $task->title = $request->title;
    $task->created_by = Auth::id();
    $task->assigned_to = $request->assigned_to;
    $task->status_id = 1;
    $task->description = $request->description;
    $task->save();

    return redirect("admin/tasks");
  }

  public function delete($id){
    Task::destroy($id);
    return redirect()->back();
  }


  public function edit($id){
    $task = Task::find($id); // lavaguyn tarberak
    $users = User::where('is_manager', 0)->get();
    $statuses = Status::all();
  return view("admin.tasks.edit", compact(["task", "users","statuses"]));

  }

  public function update(Request $request, $id){
    $task = Task::find($id);
    $task->title = $request->title;
    $task->description = $request->description;
    $task->assigned_to = $request->assigned_to;
    $task->status_id = $request->status_id;
    $task->save();
    return redirect("/admin/tasks/my");

    }

}
