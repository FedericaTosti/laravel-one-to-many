@extends('layouts.main_layout')

@section('content')
  <h2>Modifica Employee</h2>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  <form class="" action="{{route('updateEmployee', $employee['id'])}}" method="post">

    @csrf
    @method("POST")

    <label for="firstName">Nome</label>
    <input type="text" name="firstName" value="{{old("firstName", $employee["firstName"])}}">
    <br>
    <label for="lastName">Cognome</label>
    <input type="text" name="lastName" value="{{old("lastName", $employee["lastName"])}}">
    <br>
    <label for="DateOfBirth">Data di nascita</label>
    <input type="text" name="DateOfBirth" value="{{old("DateOfBirth", $employee["DateOfBirth"])}}">
    <br>
    <label for="role">Ruolo</label>
    <input type="text" name="role" value="{{old("role", $employee["role"])}}">
    <br>
    <label for="locations[]">Indirizzo</label>
    <br> <br>
    @foreach ($locations as $location)
      <input type="checkbox" name="locations[]" value="{{$location -> id}}"
        @foreach ($employee -> locations as $employeeLocation)
          @if ($employeeLocation -> id  == $location -> id)
            checked
          @endif
        @endforeach
      >
      {{$location -> street}} - {{$location -> city}} - {{$location -> state}} <br>
    @endforeach
    <br> <br>

    <a href="{{route('showEmployee', $employee["id"])}}"><button type="button" name="button">Indietro</button></a>

    <button type="submit" name="submit">Salva</button>

  </form>
@endsection
