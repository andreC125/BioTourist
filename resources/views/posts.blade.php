@extends('layouts.app')
@section('content')
<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css">

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Mon marché
                  </div>
                  <div class="container"><br>
      <h1 class="text-success text-center">Votre inventaire</h1><br>
      <table  class="table table-bordered">
          <tr class="">
              <th>Article</th>
              <th>Date de mise en vente</th>
              <th>Quantité</th>
              <th>Prix (€)</th>
              <th>Description</th>
          </tr>
          @foreach($posts as $post)
          <tr>
              <td><h3>
        <a href="{{ URL::action('PostController@view', $post->id) }}">{{ $post->title }}</a>
     </h3></td>
              <td>{{ $post ->created_at}}</td>
              <td>{{ $post ->quantité}}</td>
              <td>{{ $post ->prix}}</td>
              <td>{{ $post ->texte}}</td>
          </tr>
          @endforeach

      </table>
      <a href="{{ url('/posts/create') }}" class="button">Ajouter</a>
      </div><!--end demo-->
@endsection
