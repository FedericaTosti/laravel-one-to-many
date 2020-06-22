@extends('layouts.main_layout')

@section('content')

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

  <h3>
    <a href="{{route("createTask")}}">Aggiungi Task</a>
  </h3>

  <ol>
    @foreach ($alltasks as $task)
      <li>
        <span>Tasks: </span> {{$task["name"]}}
        <span>Descrizione: </span> {{$task["description"]}}

        <a href="{{route("showTask", $task["id"] )}}"><button type="button" name="button">Dettagli</button></a>
      </li>
      <br>
    @endforeach
  </ol>

@endsection
