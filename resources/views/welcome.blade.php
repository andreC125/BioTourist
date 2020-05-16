@extends('layouts.app')

@section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    BioTourist
                  </div>
                  <div class="carte">
                    Vous voulez voir les vendeurs de fruits et légumes aux alentours de vous ? Ou alors vous voulez vendre vos propres produits ? Vous êtes au bon endroit dans ce cas.
                  <!-- openstreemap exemple de map -->
                  <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.openstreetmap.org/export/embed.html?bbox=-1.7639923095703127%2C47.15680515217021%2C-1.4426422119140627%2C47.31974140450974&amp;layer=mapnik" allowfullscreen>
                  </iframe>

                  <!-- google embed iframe -->
                  <?php

                  $url = "https://maps.google.com/maps?q=Paris&t=&z=15&ie=UTF8&iwloc=&output=embed";
                  ?>

                  <iframe width="600" height="450" src="
                  <?php echo $url; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                  </div>
                <div class="slogan" style="margin-bottom: 80px;">
                  Votre nouveau service marchand de fruits et légumes frais à proximité !
<style>
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                

                @if (Route::has('login'))
                <div class="links">
                  @auth
                  <a href="{{ url('/map') }}">Carte</a>
                  <a href="{{ url('/home') }}">Home</a>
                  <a href="{{ url('/annonces') }}">Annonces</a>
                  <a href="{{ url('/posts') }}">Mes achats</a>
                  <a href="{{ url('/posts') }}">Mes ventes</a>
                  <a href="{{ url('/posts') }}">Mes produits</a>
                  <a href="{{ url('/posts') }}">Mes avis</a>
                  @else
                  <a href="{{ url('/map') }}">Carte</a>
                  @endif
                  @endauth
                </div>
                </div>
            </div>
        </div>
      </main>
@endsection
