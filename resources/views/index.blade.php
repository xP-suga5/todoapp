@extends('layout.default')

@section('title', 'todo')

@section('content')
<h1>Todo Lists</h1>

<div>
  <form action="/todo/create" method="post">
    @csrf
    <input type="text"  name="content">
    <input type="submit" value="送信">
  </form>
</div>


@section('content')
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>
  @foreach ($todos as $todo)
  <tr>
    <td>
      {{$todo->created_at}}
    </td>
    <td>
      <input type="text" value="{{$todo->content}}">
    </td>
    <td>
      <a href="{{ route('todo.update', ['id'=>$todo->todo_id]) }}" class="btn btn-primary">更新</a>
    </td>
    <td>
      <a href="{{ route('todo.delete', ['id'=>$todo->todo_id]) }}" class="btn btn-primary">削除</a>
    </td>
  </tr>
  @endforeach
</table>
@endsection