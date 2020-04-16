@extends('layouts.app')
 
@section('title', 'My Tickets')
 
@section('content')
 
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">Mes Tickets d'incidents</i>
                </div>
 
                <div class="panel-body">
                    @if($tickets->isEmpty())
                        <p>Vous avez crée aucun tickets d'incident.</p>
                        <div class="links">
                            <a href="/Biotourist/public/new-ticket">Creer un nouveau ticket d'incident</a>
                        </div>
                    @else
                        <div class="links">
                            <a href="/Biotourist/public/new-ticket">Creer un nouveau ticket d'incident</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Categorie</th>
                                    <th>Titre</th>
                                    <th>Statut</th>
                                    <th>Dernière Actualisation</th>
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