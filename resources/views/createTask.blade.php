@extends('layouts.main_layout')

@section('content')
  <h2>Aggiungi Task</h2>

  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
    @endforeach
  @endif

  <form class="" action="{{route('storeTask')}}" method="post">

    @csrf
    @method("POST")


    <label for="name">Nome task</label>
    <input type="text" name="name" value="{{old("name")}}">
    <br>
    <label for="description">Descrizione task</label>
    <input type="text" name="description" value="{{old("description")}}">
    <br>
    <label for="deadline">Scadenza</label>
    <input type="text" name="deadline" value="{{old("deadline")}}">
    <br>
    <label for="employee_id">Employee</label>
    <select name="employee_id">
      @foreach ($allemployees as $employee)
        <option value="{{$employee -> id}}">
          {{$employee -> firstName}} {{$employee -> lastName}}
        </option>
      @endforeach
    </select>
    <br> <br>

    <a href="{{route('home')}}"><button type="button" name="button">Indietro</button></a>

    <button type="submit" name="submit">Salva</button>
  </form>

@endsection
