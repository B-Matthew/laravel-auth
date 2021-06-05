@extends('layouts.main-layout')
@section('content')
  <main>
    <div class="containerhomepage">
      <h2>Edita qui:</h2>
      <form class="" action="{{route('update' , $car->id)}}" method="POST">
        @csrf
        @method('POST')
        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{$car->name}}">
        <label for="model">Modello:</label>
        <input type="text" name="model" value="{{$car->model}}">
        <label for="kw">KW:</label>
        <input type="number" name="kw" value="{{$car->kw}}">
        <label for="brand">Brand:</label>
        <select class="" name="brand_id">
          @foreach ($brands as $brand)
            <option value="{{$brand->id}}"
            @if ($brand->id == $car -> brand ->id)
              selected
            @endif
            >{{$brand->name}}</option>
          @endforeach

        </select><br>
        <label for="pilot">Piloti:</label><br>
        @foreach ($pilots as $pilot)
          <input type="checkbox" name="pilot_id[]" value="{{$pilot -> id}}"
          @foreach ($car -> pilots as $carpilot)
            @if ($pilot->id == $carpilot ->id)
              checked
            @endif

        @endforeach
          > {{$pilot->name}}<br>
        @endforeach

        <button type="sumbit" name="button">Update</button>
      </form>
    </div>
  </main>
@endsection
