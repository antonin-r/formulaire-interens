<?php
// réception du statut
$b = false;
// réception correcte des informations complémentaires
$bb = false;
// valeurs par défaut dans un souci de simplification du code
$msg = '';
$b1 = 1;
$b2 = 1;
$b3 = 1;
$b4 = 1;
$b5 = 1;

if (isset($_GET['status'])) {
	$b = true;
}
if ($b) {
	$status = $_GET['status'];
	if ($status == 1) {
		$bb = true;
		$msg = 'Votre inscription à l\'hébergement des élèves des autres ENS dans le cadre des InterENS a bien été enregistrée. Un grand merci pour votre participation.';
	} else {
		$tb1 = isset($_GET['b1']);
		$tb2 = isset($_GET['b2']);
		$tb3 = isset($_GET['b3']);
		$tb4 = isset($_GET['b4']);
		$tb5 = isset($_GET['b5']);
		if ($tb1 && $tb2 && $tb3 && $tb4 && $tb5) {
			$bb = true;
			$msg = 'Votre inscription comporte des erreurs. Merci de bien vouloir les corriger afin que votre participation soit bien prise en compte.';
			$b1 = $_GET['b1'];
			$b2 = $_GET['b2'];
			$b3 = $_GET['b3'];
			$b4 = $_GET['b4'];
			$b5 = $_GET['b5'];
		} else {
			header('Location: index.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hébergement InterENS</title>
	<style type="text/css">
		.error {
			color: red;
			font-weight: bold;
		}
	</style>
</head>
<body>
<?php
if ($msg != '') {
?>
	<p><?php echo $msg; ?></p>
<?php
}
if (!($b && $status == '1')) {
?>
	<form method="POST" action="handle.php">
<?php
if ($b1 == 0) {
?>
		<p class="error">Veuillez s'il vous plaît saisir un prénom.</p>
<?php
}
?>
		<p><label for="firstname">Prénom : </label><br /><input type="text" name="firstname" id="firstname" /></p>
<?php
if ($b2 == 0) {
?>
		<p class="error">Veuillez s'il vous plaît saisir un nom.</p>
<?php
}
?>
		<p><label for="lastname">Nom : </label><br /><input type="text" name="lastname" id="lastname" /></p>
<?php
if ($b3 == 0) {
?>
		<p class="error">Veuillez s'il vous plaît saisir une valeur parmi celles proposées.</p>
<?php
}
?>
		<p>Souhaite héberger préférentiellement :<br />
			<input type="radio" name="opt1" value="A" id="A" />
			<label for="A">une personne se revendiquant de genre féminin</label><br />
			<input type="radio" name="opt1" value="B" id="B" />
			<label for="B">une personne se revendiquant de genre masculin</label><br />
			<input type="radio" name="opt1" value="C" id="C" />
			<label for="C">une personne se revendiquant de genre neutre, multiple ou autre que mentionné précédemment</label><br />
			<input type="radio" name="opt1" value="D" id="D" checked />
			<label for="D">une personne indifféremment de tout critère de genre</label><br />
		</p>
<?php
if ($b4 == 0) {
?>
		<p class="error">Veuillez s'il vous plaît saisir une valeur parmi celles proposées.</p>
<?php
}
?>
		<p>Souhaite héberger préférentiellement :<br />
			<input type="radio" name="opt2" value="AA" id="AA" />
			<label for="AA">une personne aux horaires de sommeil "classiques", calés sur le tournoi sportif (organisation/participation)</label><br />
			<input type="radio" name="opt2" value="BB" id="BB" />
			<label for="BB">une personne aux horaires de sommeil calés sur les soirées</label><br />
			<input type="radio" name="opt2" value="CC" id="CC" checked />
			<label for="CC">une personne aux horaires de sommeil incertains</label><br />
		</p>
<?php
if ($b5 == 0) {
?>
		<p class="error">Veuillez s'il vous plaît vous engager à respecter les modalités d'hébergement spécifiées.</p>
<?php
}
?>
		<p>S'engage à respecter les modalités d'hébergement spécifiées ci-dessous, pour que tout le monde profite au mieux de ces quelques jours de sport et de fête :<br />
			<input type="radio" name="opt3" value="AAA" id="AAA" />
			<label for="AAA">oui</label><br />
			<input type="radio" name="opt3" value="BBB" id="BBB" checked/>
			<label for="BBB">non</label><br />
		</p>
		<p><input type="submit" value="Envoyer" /></p>
	</form>
<?php
}
?>
</body>
</html>
