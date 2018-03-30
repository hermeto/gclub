<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>GClub - Challenge</title>
</head>
<body>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"></div>

<div class="container">
    @foreach($groups as $group)
        @if($group['open'])  <div class="card-deck mb-4 text-center"> @endif
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"> {{ $group['name'] }} </h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mt-3 mb-4">
                        @foreach($group['teams'] as $teams)
                            <li> {{ $teams->team->name }}</li>
                        @endforeach
                    </ul>
                    <a type="button" class="btn btn-lg btn-block btn-outline-primary" href="/group/match">Partidas</a>
                </div>
            </div>
        @if($group['close']) </div> @endif
    @endforeach
    <a type="button" class="btn btn-lg btn-block btn-outline-primary" href="/group/overall-ranking">Classificação Geral</a>
</div>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center"></div>
</body>
</html>