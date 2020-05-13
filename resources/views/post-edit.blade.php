@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BioTourist</title>

    <!-- Fonts -->

<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="flex-center position-ref full-height">
      <div class="content">
          <div class="title m-b-md">
              Mon marché
            </div>
            <div class="container"><br>
<h1 class="text-success text-center">Votre inventaire</h1><br>
  <a href="{{ URL::action('PostController@index') }}">Retour à la liste</a>
  @if (Request::path() === '/edit')
   - <a href="{{ URL::action('PostController@view', $post->id) }}">Annuler</a>
  @else
  @endif
   <h1>Editer l'article</h1>
   {{ Form::model(
       $post, [
          'url'=>$post->id ? URL::action('PostController@update', $post ) : URL::action('PostController@create', $post),
          'method'=>$post->id ? 'POST' : 'PUT'
       ]
    )
 }}
 <p>{{ Form::label('title', 'Article :') }} {{ Form::text('title') }}</p>
 <p>{{ Form::label('quantité', 'Quantité :') }} {{ Form::number('quantité') }}</p>
  <p>{{ Form::label('prix', 'Prix(€) :') }} {{ Form::text('prix') }}</p>
 <p>{{ Form::label('texte', 'Description :') }} {{ Form::textarea('texte') }}</p>
 {{ Form::submit() }}
 {{ Form::close() }}
</div>
</div>
</div>

</body>
</html>
@endsection
