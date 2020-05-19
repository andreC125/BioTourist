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
                            {{{trans('auth.view all')}}} <a href="{{ url('admin/tickets') }}">{{{trans('auth.tickets')}}}</a>
                        </p>
                    @else

                        <p>
                            {{{trans('auth.see all your')}}} <a href="{{ url('my_tickets') }}">{{{trans('auth.tickets')}}}</a> {{{trans('auth.or')}}} <a href="{{ url('new-ticket') }}">{{{trans('auth.open a new ticket')}}}</a>
                        </p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
