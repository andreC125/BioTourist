@extends('layouts.admin')

@section('title', 'My Tickets')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">{{{trans('auth.my Incident Tickets')}}}</i>
                </div>

                <div class="panel-body">
                    @if($tickets->isEmpty())
                        <p>{{{trans('auth.you didn\'t create any incident tickets.')}}}</p>
                        <div class="links">
                            <a href="{{ url('new-ticket') }}">{{{trans('auth.create a new incident ticket')}}}</a>
                        </div>
                    @else
                        <div class="links">
                            <a href="{{ url('new-ticket') }}">{{{trans('auth.create a new incident ticket')}}}</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{{trans('auth.category')}}}</th>
                                    <th>{{{trans('auth.title')}}}</th>
                                    <th>{{{trans('auth.status')}}}</th>
                                    <th>{{{trans('auth.latest Update')}}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td>
                                            {{ $ticket->category->name }}
                                        </td>
                                        <td>
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($ticket->status == "Ouvert")
                                                <span class="label label-success">{{ $ticket->status }}</span>
                                            @else
                                                <span class="label label-danger">{{ $ticket->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $ticket->updated_at }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
