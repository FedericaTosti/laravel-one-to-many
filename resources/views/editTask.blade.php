@extends('layouts.main_layout')

@section('content')
  <h2>Modifica Task</h2>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  <form class="" action="{{route('updateTask', $task['id'])}}" method="post">

    @csrf
    @method("POST")

    <label for="name">Nome</label>
    <input type="text" name="name" value="{{old("name", $task["name"])}}">
    <br>
    <label for="description">Descrizione</label>
    <input type="text" name="description" value="{{old("description", $task["description"])}}">
    <br>
    <label for="deadline">Scadenza</label>
    <input type="text" name="deadline" value="{{old("deadline", $task["deadline"])}}">
    <br>
    <label for="employee_id">Employee</label>
    <select name="employee_id">
      @foreach ($allemployees as $employee)
        <option value="{{$employee -> id}}"
          @if ($employee -> id === $task -> employee_id)
            selected
          @endif >
          {{$employee -> firstName}} {{$employee -> lastName}}
        </option>
      @endforeach
    </select>
    <br> <br>

    <a href="{{route('showTask', $task["id"])}}"><button type="button" name="button">Indietro</button></a>

    <button type="submit" name="submit">Salva</button>

  </form>
@endsection
