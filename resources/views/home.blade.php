@extends('layouts.main_layout')

@section('content')

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

  <h2>Tasks</h2>

  <h4>
    <a href="{{route("createTask")}}">Aggiungi Task</a>
  </h4>

  <ol>
    @foreach ($alltasks as $task)
      <li>
        <span>Tasks: </span> {{$task["name"]}}
        <span>Descrizione: </span> {{$task["description"]}}
        {{-- <span>Employee: </span> {{$task -> employee -> firstName}} {{$task -> employee -> lastName}} --}}

        <a href="{{route("showTask", $task["id"] )}}"><button type="button" name="button">Dettagli task</button></a>
      </li>
      <br>
    @endforeach
  </ol>

  <h2>Employees</h2>

  <h4>
    <a href="{{route("createEmployee")}}">Aggiungi Employee</a>
  </h4>

  <ol>
    @foreach ($employees as $employee)
      <li>
        <span>Nome e Cognome: </span> {{$employee -> firstName}} {{$employee -> lastName}}

        <a href="{{route("showEmployee", $employee -> id )}}"><button type="button" name="button">Dettagli employee</button></a>
      </li>
      <br>
    @endforeach
  </ol>

@endsection
