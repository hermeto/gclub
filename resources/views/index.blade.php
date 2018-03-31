@extends('main')
@section('content')
    <div class="text-center">
        <h1 class="display-4">Gamers Club Challenge</h1>
        <form method="get" action="/start">
            @csrf
            <button type="submit" class="btn btn-lg* btn-block btn-primary">Start</button>
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="col-6 col-md text-center">
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Desafio</a></li>
                        <li><a class="text-muted" href="#">Código fonte</a></li>
                    </ul>
                </div>
            </footer>
        </form>
    </div>
@stop