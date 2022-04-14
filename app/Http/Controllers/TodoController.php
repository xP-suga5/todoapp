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
        //$this->validate($request, Todo::$rules);
        $request->validate(
            [
                'content' => 'required||max:20',
            ],
            [
                'content.required' => 'コンテンツ入力してください。',
                'content.max' => '最大文字数は20文字です。',
            ]
        );

        $form = $request->all();
        unset($form['_token_']);
        Todo::create($form);
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        //$this->validate($request, Todo::$rules);
        $request->validate(
            [
                'content' => 'required||max:20',
            ],
            [
                'content.required' => 'コンテンツ入力してください。',
                'content.max' => '最大文字数は20文字です。',
            ]
        );
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
