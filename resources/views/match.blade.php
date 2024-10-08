@extends('main') 
@section('content')
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $results[0]->group->name }}</h4>
        </div>
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
        <a type="button" class="btn btn-outline-primary" href="/group">Groups</a>
    </div>
@stop
