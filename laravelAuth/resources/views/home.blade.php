@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Ciao {{  Auth::user()->name }} :D
                    <div class="">
                      <a href="{{route('homepage')}}">Clicca qui ed Iniziamo l'esercizio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
