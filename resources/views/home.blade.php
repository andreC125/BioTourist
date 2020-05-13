@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tableau de bord</div>

                <div class="panel-body">

                    <p>Votre êtes connecté !</p>

                    @if(Auth::user()->is_admin)

                        <p>
                            Voir tous les <a href="{{ url('admin/tickets') }}">tickets</a>
                        </p>
                    @else

                        <p>
                            Voir tous vos <a href="{{ url('my_tickets') }}">tickets</a> ou <a href="{{ url('new-ticket') }}">Ouvrir un nouveau ticket</a>
                        </p>

                    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{{ trans('auth.dashboard')}}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                {{{ trans('auth.login') }}}
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
