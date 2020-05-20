@extends('layouts.app')
<style>
  .m-b-md {
      margin-bottom: 30px;
  }
</style>

@section('content')

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    BioTourist
                  </div>
                  <div class="carte">
                   {{{trans('auth.Want to see the produce vendors around you ? Or do you want to sell your own products ? Then you\'ve come to the right place.')}}}
                  <!-- openstreemap exemple de map --><
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
                  {{{trans('auth.Your new fresh fruit and vegetable market service nearby !')}}}

    </head>
    <body>


        <div class="flex-center position-ref full-height">


            <div class="content">


                @if (Route::has('login'))
                <div class="links">
                  @auth
                  <a href="{{ url('/map') }}">{{{trans('auth.map')}}}</a>
                  <a href="{{ url('/home') }}">{{{trans('auth.home')}}}</a>

                  @else
                  <a href="{{ url('/map') }}">{{{trans('auth.map')}}}</a>
                  @endif
                  @endauth
                </div>
                </div>
            </div>
        </div>
      </main>
@endsection
