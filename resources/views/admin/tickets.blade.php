@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{{trans('auth.dashboard')}}}</div>

                <div class="panel-body">

                    <p>{{{trans('auth.login')}}}</p>

                    @if(Auth::user()->admin)

                        <p>
                            {{{trans('auth.view all')}}} <a href="{{ url('admin/tickets') }}">tickets</a>
                        </p>
                    @else

                        <p>
                            Voir tous vos <a href="{{ url('my_tickets') }}">tickets</a> ou <a href="{{ url('new-ticket') }}">Ouvrir un nouveau ticket</a>
                        </p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
