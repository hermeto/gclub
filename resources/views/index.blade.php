@extends('main')
@section('content')
    <div class="text-center">
        <h1 class="display-5">Gamers Club Challenge</h1>
        <button type="button" class="btn btn-primary btn-lg" onclick="group.process();" id="group-btn">Start</button>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="col-6 col-md text-center">
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" target="_blank" href="https://docs.google.com/document/d/1VZuUwwern7a7FbgG4DG7-LscHMpHwMYUE_zrS118U7s/edit">Challenge</a></li>
                    <li><a class="text-muted" target="_blank" href="https://github.com/hermeto/gclub">Source</a></li>
                </ul>
            </div>
        </footer>
    </div>
    {!! HTML::script('js/group.js') !!}
@stop