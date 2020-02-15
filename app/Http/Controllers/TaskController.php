<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::all()]);
        //dd(Task::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required'
        ]);

        $task = new Task();
        $task->title = $request->input('title', 'Task title');
        $task->description = $request->input('description', 'Task description');
        $task->user_id = $request->user()->id;
        $task->save();

        $request->session()->flash('status', 'New task created, good luck Chuck!');

        return redirect()->route('tasks.show', ['task' => $task->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // this will actually spawn two DB queries, which is not optimal.
        // better would be a single statement to get all the data at once and let
        // the DB handle the rest, e.g.:
        // Task::findOrFail($id)->join('users', 'users.id', '=', 'tasks.user_id')->first();
        $t = Task::findOrFail($id);
        $u = $t->user;
        return view('tasks.show', ['task' => $t, 'user' => $u]);
        // dd(Task::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
