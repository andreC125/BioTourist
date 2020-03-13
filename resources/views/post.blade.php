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
      <table  class="table table-bordered">
          <tr class="">
            <th>Article</th>
            <th>Date de mise en vente</th>
            <th>Quantité</th>
            <th>Prix (€)</th>
            <th>Description</th>
          </tr>
          <tr>
              <td><h1>{{ $post->title }}</h1></td>
              <td>{{ $post ->created_at}}</td>
              <td>{{ $post ->quantité}}</td>
              <td>{{ $post ->prix}}</td>
              <td>{{ $post ->texte}}</td>
              <td><p>
                <a href="{{ URL::action('PostController@edit', $post->id) }}" class="button">Modifier</a>
               {{ Form::model(
                        $post, [
                           'url' => URL::action('PostController@delete', $post ),
                           'method' => 'DELETE'
                        ]
                  )
               }}
               {{ Form::submit('Supprimer', ['class' => 'button']) }}
               {{ Form::close() }}</p></td>
          </tr>
        </table>


</div>
</div>
</div>

   </body>
</html>
@endsection
