@extends('layouts.admin')

@section('title', 'All Tickets')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">{{{trans('auth.tickets')}}}</i>
                </div>
                @if (isset($tickets))
                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Actuellement aucun tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{{trans('auth.category')}}}</th>
                                <th>{{{trans('auth.title')}}}</th>
                                <th>{{{trans('auth.status')}}}</th>
                                <th>{{{trans('auth.latest Update')}}}</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        {{ $ticket->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Ouvert')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $ticket->updated_at }}</td>
                                    <td>
                                        @if($ticket->status === 'Ouvert')
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">{{{trans('auth.comment')}}}</a>

                                            <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">{{{trans('auth.closing')}}}</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
