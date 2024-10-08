@extends('main') 
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link @if($phase == 0) active @endif" href="/playoff/result/0">Sixteenth-finals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($phase == 1) active @endif" href="/playoff/result/1">Eighth-finals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($phase == 2) active @endif" href="/playoff/result/2">Quarter-finals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($phase == 3) active @endif" href="/playoff/result/3">Semi-finals</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if($phase == 4) active @endif" href="/playoff/result/4">Final</a>
        </li>
    </ul>
    <div class="card mb-4 box-shadow">
        <div class="card-body">
            <table class="table">
                <tbody>
                @foreach($results as $result)
                    @if($result['open'])
                        <tr> @endif
                            <td>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr @if($result['winner']) class="alert-success" @endif>
                                        <td>{{ $result->challengerTeam->name }}</td>
                                        <td class="text-center">{{ $result->challenger_score }}</td>
                                    </tr>
                                    <tr @if(!$result['winner']) class="alert-success" @endif>
                                        <td>{{ $result->challengedTeam->name }}</td>
                                        <td class="text-center">{{ $result->challenged_score }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        @if($result['close'])
                            <tr> @endif
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        <a type="button" class="btn btn-outline-primary" onclick="playoff.group();">Groups</a>
        <a type="button" class="btn btn-outline-danger" onclick="playoff.reset();">Restart</a>
    </div>
    {!! HTML::script('js/playoff.js') !!}
@stop
