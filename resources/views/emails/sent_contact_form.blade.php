<p>Folgende Nachricht ist via Kontaktformular versendet worden:</p>
<table>
	<tr>
		<td>Vorname</td>
		<td><?= $emailform['prename']; ?></td>
	</tr>
	<tr>
		<td>Nachname</td>
		<td><?= $emailform['name']; ?></td>
	</tr>
	<tr>
		<td>E-Mail</td>
		<td><?= $emailform['email']; ?></td>
	</tr>
	<tr>
		<td>Betreff</td>
		<td><?= $emailform['subject']; ?></td>
	</tr>
	<tr>
		<td>Nachricht</td>
		<td><?= $emailform['message']; ?></td>
	</tr>
</table>