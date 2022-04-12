<div>
  <form action="/todo/create" method="post">
    @csrf
    <input type="text">
    <input type="submit" value="送信する">
    <!--<a href="{{ route('todo.create') }}">追加</a>-->
  </form>
</div>

<!--<div>
<form action="/" method="post">
  @csrf
  <input type="text">
  <a href="{{ route('todo.create') }}">追加</a>
</form>
</div>-->
<!--@extends('todo.create')-->