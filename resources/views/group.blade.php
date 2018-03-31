@extends('main')
@section('content')
    @foreach($groups as $group)
        @if($group['open'])  <div class="card-deck mb-4 text-center"> @endif
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"> {{ $group['name'] }} </h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        @foreach($group['teams'] as $teams)
                            <li @if($teams['playoffs']) class="alert-success" @endif> {{ $teams->team->name }}</li>
                        @endforeach
                    </ul>
                    <a type="button" class="btn btn-lg btn-block btn-outline-primary" href="/match/{{ $group['id'] }}">Partidas</a>
                </div>
            </div>
        @if($group['close']) </div> @endif
    @endforeach
    <a type="button" class="btn btn-lg btn-block btn-outline-primary" href="/geral">Classificação Geral</a>
@stop