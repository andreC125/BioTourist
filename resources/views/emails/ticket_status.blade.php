<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>Statut du ticket d'incident</title>
	</head>
	<body>
		<p>
		    Bonjour {{ ucfirst($ticketOwner->name) }},
		</p>
		<p>
		    Votre ticket d'incident avec l'ID #{{ $ticket->ticket_id }} a été marqué, résolu et fermé.
		</p>
	</body>
</html>