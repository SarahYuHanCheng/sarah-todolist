<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todolist', ['todos' => $todos]);
        // return response(["data" => Todo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->headers->set('Accept', 'application/json');
        $this->validate($request, [
            'name' => 'required|unique:todos|max:255'
        ]);

        Todo::create($request->all());
        return redirect('todos');
        // return response(['created_data' => $new_todo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('editTodo', ['id' => $todo->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $this->validate($request, [
            'name' => 'required|unique:todos|max:255'
        ]);

        $target_todo = Todo::where('id', $todo->id)->first();
        $target_todo->update($request->all());
        // $new_todo = Todo::where('id', $todo->id)->update($validatedData);
        // return response(['created_data' => $target_todo]);
        return redirect('todos');
    }


    public function completed(Request $request, Todo $todo){
        $target_todo = Todo::where('id', $todo->id)->first();
        $target_todo->update(['done' => 1]);
        return redirect('todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $target_todo = Todo::where('id', $todo->id)->delete();
        return redirect('todos');
        // $target_todo->update($validatedData);
        // return response(['result'=> 'deleted']);
    }
}
