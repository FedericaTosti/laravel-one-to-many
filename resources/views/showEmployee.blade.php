@extends('layouts.main_layout')

@section('content')

  <h2>Dettagli employee</h2>

  @if (session("success"))
    <p>{{session("success")}}</p>
  @endif

  <span>Nome e Cognome:</span>
  {{$employee["firstName"]}} {{$employee["lastName"]}}
  <br>
  <span>Data di nascita:</span>
  {{$employee["DateOfBirth"]}}
  <br>
  <span>Indirizzo:</span>
  @foreach ($employee -> locations as $location)
    {{$location -> street}} -
    {{$location -> city}} -
    {{$location -> state}}
    <br>
  @endforeach
  <br> <br>

  <a href="{{route('home')}}"><button type="button" name="button">Indietro</button></a>

  <a href="{{route("editEmployee",$employee["id"])}}"><button type="button" name="button">Modifica</button></a>

  <a href="{{route("destroyEmployee", $employee["id"])}}"><button type="button" name="button">Elimina</button></a>

@endsection
