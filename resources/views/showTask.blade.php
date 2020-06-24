@extends('layouts.main_layout')

@section('content')

  <h2>Dettagli task</h2>

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

  <span>Nome task:</span>
  {{$task["name"]}}
  <br>
  <span>Descrizione:</span>
  {{$task["description"]}}
  <br>
  <span>Scadenza:</span>
  {{$task["deadline"]}}
  <br>
  <span>Dipendente:</span>
  {{$task -> employee -> firstName}} {{$task -> employee -> lastName}}
  <br> <br>

  <a href="{{route('home')}}"><button type="button" name="button">Indietro</button></a>

  <a href="{{route("editTask",$task["id"])}}"><button type="button" name="button">Modifica</button></a>

  <a href="{{route("destroyTask", $task["id"])}}"><button type="button" name="button">Elimina</button></a>

  <a href="{{route("showEmployee", $task -> employee -> id )}}"><button type="button" name="button">Dettagli dipendente</button></a>

@endsection
