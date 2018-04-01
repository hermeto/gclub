@extends('main')
@section('content')
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Ranking</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Team</th>
                    <th scope="col" class="text-center">Victory</th>
                    <th scope="col" class="text-center">Score</th>
                </tr>
                </thead>
                <tbody>
                @php $count = 1; @endphp
                @foreach($results as $result)
                    <tr @if($result['playoffs']) class="alert-success" @endif>
                        <th scope="row">{{ $count++  }}</th>
                        <td>{{ $result->name }}</td>
                        <td class="text-center">{{ $result->victory }}</td>
                        <td class="text-center">{{ $result->score }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center">
        <a type="button" class="btn btn-outline-primary" href="/group">Groups</a>
    </div>
@stop