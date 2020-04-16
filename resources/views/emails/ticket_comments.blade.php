<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
<p>
    {{ $comment->comment }}
</p>
 
---
<p>Réalisé par: {{ $user->name }}</p>
 
<p>Titre: {{ $ticket->title }}</p>
<p>Ticket ID: {{ $ticket->ticket_id }}</p>
<p>Statut: {{ $ticket->status }}</p>
 
<p>
    Vous pouvez consulter le ticket d'incident à tout moment sur {{ url('tickets/'. $ticket->ticket_id) }}
</p>
 
</body>
</html>