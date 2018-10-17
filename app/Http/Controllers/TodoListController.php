<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStore;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $filter
     * @return \Illuminate\Http\Response
     */
    public function index($filter = null)
    {
        $todolistQuery = auth()->user()->todos();
        if(!empty($filter) && $filter == 'expired'){
            $todolistQuery->where('expired_at','<',Carbon::now());
        }

        if(!empty($filter) && $filter == 'new'){
            $todolistQuery->where('expired_at','>',Carbon::now());
        }

        $todolist = $todolistQuery->get();

        return view('todo.index', ['todoList' => $todolist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TodoStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoStore $request)
    {

        auth()->user()->todos()->create([
            'title' => $request->title,
            'expired_at' => $request->get('expired_at'),
        ]);
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = auth()->user()->todos()->where('id', $id)->first();
        return view('todo.edit', ['todo' => $todo]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = auth()->user()->todos()->where('id', $id)->first();
        $todo->update($request->all());
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->todos()->where('id', $id)->delete();
        return redirect()->route('todo.index');
    }
}
