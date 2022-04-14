@extends('layout.default')

@section('title', 'todo')

@section('content')
<div class = "container">
  <h1>Todo Lists</h1>

  <div class="content-create">
    @if (count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
    @endif
    <form action="/todo/create" method="post" class="content-create__form">
      @csrf
      <input type="text" name="content" class="text_content content-create__text">
      <input type="submit" value="送信" class="btn content-create__btn">
    </form>
  </div>
  
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
        <form action="{{ route('todo.update', ['id'=>$todo->id]) }}" method="POST"  class="content-update__form">
          @csrf
          <input type="text" value="{{$todo->content}}" name="content" class="text_content content-update__text">
      </td>
      <td>
        <input type="submit" value="更新" class="btn content-update__btn">
        </form>
      </td>

      <td>
        <form action="{{ route('todo.delete', ['id'=>$todo->id]) }}" method="POST" class="content-delite__form">
          @csrf
          <button type="submit" class="btn content-delete__btn">削除</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>

</div>
@endsection