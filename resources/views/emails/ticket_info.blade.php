<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title>Support d'information de ticket</title>
		</head>
	<body>
		<p>
			Merci {{ ucfirst($user->name) }} d'avoir contacté notre équipe de support. Un ticket de support a été ouvert pour vous. Vous serez notifié si une réponse est faite par mail. Les informations de votre ticket sont ci-dessous :
		</p>

		<p>Titre: {{ $ticket->title }}</p>
		<p>Priorité: {{ $ticket->priority }}</p>
		<p>Statut: {{ $ticket->status }}</p>
	 
		<p>
			Vous pouvez regarder votre ticket à tout moment a {{ url('tickets/'. $ticket->ticket_id) }}
		</p>
	</body>
</html>