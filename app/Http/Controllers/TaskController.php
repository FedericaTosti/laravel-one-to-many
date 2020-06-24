<?php

namespace App\Http\Controllers;

use App\Task;
use App\Employee;
use App\Location;

use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index(){
    $alltasks = Task::all();
    $employees = Employee::all();
    return view('home', compact("alltasks", "employees"));
  }

  public function show($id){
    $task = Task::findOrFail($id);
    $allemployees = Employee::all();
    return view('showTask', compact("task", "allemployees"));
  }

  // per modifica
  public function edit($id){
    $task = Task::findOrFail($id);
    $allemployees = Employee::all();
    $locations = Location::all();
    return view('editTask', compact("task", "allemployees", "locations"));
  }
  // per modifica
  public function update(Request $request, $id){

    $validateData = $request -> validate([
      "name" => "required|max:35",
      "description" => "required|max:100",
      "deadline" => "required|date",
      "employee_id" => "required"
    ]);

    Task::whereId($id) -> update($validateData);

    return redirect() -> route("showTask", $id)
                      -> withSuccess("Task " . $validateData["name"] . " correttamente aggiornato");
  }

  //per eliminazione
  public function destroy($id){
    $task = Task::findOrFail($id);
    $task -> delete();
    return redirect() -> route("home")
                      -> withSuccess("Task " . $task["name"] . " correttamente eliminato");
  }

  // per inserimento nuovo
  public function create(){
    $allemployees = Employee::all();
    return view('createTask', compact("allemployees"));
  }

  // per inserimento nuovo
  public function store(Request $request){
    $validateData = $request -> validate([
      "name" => "required|max:35",
      "description" => "required|max:100",
      "deadline" => "required|date",
      "employee_id" => "required"
    ]);

    $task = new Task;

    $task -> name = $validateData["name"];
    $task -> description = $validateData["description"];
    $task -> deadline = $validateData["deadline"];
    $task -> employee_id = $validateData["employee_id"];

    $task -> save();

    return redirect() -> route("home")
                      -> withSuccess("Task " . $task["name"] . " correttamente aggiunto");
  }
}
