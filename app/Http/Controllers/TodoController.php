<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return view('index', ['todos' => $todo]);
    }

    public function create(Request $request)
    {
        $this->validate($request, Todo::$rules);

        $form = $request->all();
        unset($form['_token_']);
        Todo::create($form);
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, Todo::$rules);

        $todo = Todo::find($id);
        $todo->content = $request->content;
        $todo->save();
        return redirect('/');
    }


    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/');
    }
}
