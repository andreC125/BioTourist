<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BioTourist</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">BioTourist</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

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
                        <!-- Authentication Links -->
                         @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{{trans('auth.log in')}}}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{{trans('auth.register')}}}</a>
                                </li>
                            @endif
                        @else
                            @admin
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">Administration</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.index') }}">{{{trans('auth.my account')}}}</a>
                                </li>
                            @endadmin
                            <li class="nav-item"><a class="nav-link" id="sloganheader">{{{trans('auth.welcome')}}}@lang('  '.Auth::user()->name.' ('.Auth::user()->role.')')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('annonces.create') }}">{{{ trans('auth.create post')}}} </a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{{trans('auth.logout')}}}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            @yield('content')

<footer>
        <nav class="navbar navbar-expand fixed-bottom navbar-dark">
            <div class="navbar-nav ml-auto">

              <a class="nav-item nav-link " href="{{ route('support') }}">{{{trans('auth.contact')}}}</a>
                <a class="nav-item nav-link " href="{{ route('legal') }}">{{{trans('auth.legal Notice')}}}</a>
                <a class="nav-item nav-link " href="{{ route('confidentialite') }}">{{{trans('auth.privacy Policy')}}}</a>
            </div>
        </nav>


    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')


</footer>
</html>
