@extends('layouts.admin')

@section('title', $ticket->title)

@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>{{{trans('auth.category')}}}: {{ $ticket->category->name }}</p>
                        <p>
                            @if ($ticket->status === 'Ouvert')
                                {{{trans('auth.status')}}}: <span class="label label-success">{{ $ticket->status }}</span>
                            @else
                            {{{trans('auth.status')}}}: <span class="label label-danger">{{ $ticket->status }}</span>
                            @endif
                        </p>
                        <p>{{{trans('auth.created on')}}}: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                </div>
            </div>

            <hr>

            @include('tickets.comments')

            <hr>

            @include('tickets.reply')

        </div>
    </div>


@endsection
