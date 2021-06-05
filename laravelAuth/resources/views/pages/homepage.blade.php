@extends('layouts.main-layout')
@section('content')
  <main>
    <div class="containerhomepage">
      <h2>Lista:</h2>

      <ul>
        @foreach ($cars as $car)
          <li>
            <h4>Macchine:</h4>
            {{$car-> name}} {{$car-> model}} <a href="{{route('edit', $car -> id)}}">Edit</a>
            <a href="{{route('delete', $car -> id)}}">delete</a><br>
            <h4>Brand:</h4>
            {{$car->brand->name}} <br>
            <h4>Piloti:</h4>
            @foreach ($car -> pilots as $pilot)
              <a class='listHref' href="#">{{$pilot->name}} {{$pilot->lastname}}</a><br>
            @endforeach
          </li>
        @endforeach
      </ul>
    </div>
  </main>
@endsection
