<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Annonces</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>
<ul class="navbar-nav mr-auto">
  <li class="nav-item dropdown">
      <a class="nav-link" href="#" id="navbarDropdownFlag" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <img width="32" height="32" alt="{{ session('locale') }}"
                  src="{!! asset('images/flags/' . session('locale') . '-flag.png') !!}"/>
      </a>
      <div id="flags" class="dropdown-menu" aria-labelledby="navbarDropdownFlag">
         @foreach(config('app.locales') as $locale)
          
              @if($locale != session('locale'))
                  <a class="dropdown-item" href="{{ route('language', $locale) }}">
                      
                      <img width="32" height="32" alt="{{ session('locale') }}"
                              src="{!! asset('images/flags/' . $locale . '-flag.png') !!}"/>
                  </a>
              @endif
          @endforeach
      </div>
  </li>