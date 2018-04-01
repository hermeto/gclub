@extends('main') 
@section('content')
    @foreach($groups as $group)
        @if($group['open'])
            <div class="card-deck mb-4 text-center"> @endif
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
                        <a type="button" class="btn btn-outline-primary" href="/match/{{ $group['id'] }}">Rounds</a>
                    </div>
                </div>
                @if($group['close']) </div> @endif
    @endforeach
    <div class="text-center">
        <a type="button" class="btn btn-outline-primary" onclick="group.home();">Home</a>
        <a type="button" class="btn btn-outline-primary" onclick="group.ranking();">Ranking</a>
        <a type="button" class="btn btn-outline-primary" onclick="playoff.process();">Playoffs</a>
        <a type="button" class="btn btn-outline-danger" onclick="group.reset();">Restart</a>
    </div>
    {!! HTML::script('js/group.js') !!}
    {!! HTML::script('js/playoff.js') !!}
@stop
