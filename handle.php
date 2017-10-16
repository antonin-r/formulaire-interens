<?php
require('core.php');

if (! isset($_POST['firstname'])) {
	header('Location: index.php');
}

$opts1 = array('A', 'B', 'C', 'D');
$opts2 = array('AA', 'BB', 'CC');
$opts3 = array('AAA', 'BBB');

$fname = trim($_POST['firstname']);
$lname = trim($_POST['lastname']);
$opt1 = $_POST['opt1'];
$opt2 = $_POST['opt2'];
$opt3 = $_POST['opt3'];

$vars = array(
	$fname,
	$lname,
	$opt1,
	$opt2,
	$opt3
);
var_dump($_POST);
var_dump($vars);

$b1 = 0;
$b2 = 0;
$b3 = 0;
$b4 = 0;
$b5 = 0;

if (strlen($fname) != 0) {
	$b1 = 1;
}
if (strlen($lname) != 0) {
	$b2 = 1;
}
if (in_array($opt1, $opts1)) {
	$b3 = 1;
}
if (in_array($opt2, $opts2)) {
	$b4 = 1;
}
if ($opt3 == 'AAA') {
	$b5 = 1;
}

$sum = $b1 + $b2 + $b3 + $b4 + $b5;

if ($sum == 5) {
	// enregistrement dans la base de données PSQL
	$db = db_connect();

	$query = $db -> prepare('INSERT INTO '.$_table.'
		(
			firstname,
			lastname,
			opt1,
			opt2
		) VALUES (
			:firstname,
			:lastname,
			:opt1,
			:opt2
		)');
	$query -> execute(
		array(
			'firstname' => $fname,
			'lastname' => $lname,
			'opt1' => $opt1,
			'opt2' => $opt2
		)
	);
	$query -> closeCursor();

	$db = null;

	header('Location: index.php?status=1');
} else {
	header('Location: index.php?status=0&b1='.$b1.'&b2='.$b2.'&b3='.$b3.'&b4='.$b4.'&b5='.$b5);
}
