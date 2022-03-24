<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = DB::select('select * from tasks');
        // dd($tasks);
        return view('tasks.home',compact('tasks'));
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            "task" => ["required"]
        ]);
        // dd();
        DB::insert('insert into tasks (name) values (?)', [$request->task]);
        return redirect()->route('task.home');
    }
    public function done($id)
    {
        echo $id;
        DB::update('update tasks set is_completed = 1 where id = ?',[$id]);
        return redirect()->route('task.home');
    }
    public function undone($id)
    {
        echo $id;
        DB::update('update tasks set is_completed = 0 where id = ?',[$id]);
        return redirect()->route('task.home');
    }
    public function update(Request $request)
    {
        echo "Working on this feature";
        // dd(DB::update('update task name = ? where id = ?',[$request->task, $request->id]));
        $affected = DB::update('update tasks set name = ? where id = ?',[$request->task, $request->id]);
        // dd($affected);
        return redirect()->route('task.home');

    }
    public function delete($id)
    {
        $deleted = DB::delete('delete from tasks where id=?',[$id]);
        return redirect()->route('task.home');
    }
}
