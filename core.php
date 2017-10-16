<?php
$_mode = 'pgsql';
// à modifier
$_mode = 'mysql';
$_host = '';
$_port = '';
$_dbname = '';
$_user = '';
$_password = '';
$_table = 'interens17_hebergement';

define('AUTH', array(
		'mode' => $_mode,
		'host' => $_host,
		'port' => $_port,
		'dbname' => $_dbname,
		'user' => $_user,
		'password' => $_password
	)
);

function db_connect($auth = AUTH) {
	try {
		$param = '';
		$param .= $auth['mode'].':host='.$auth['host'].';';
		$param .= 'dbname='.$auth['dbname'].';';
		$param .= 'port='.$auth['port'].';';
		$param .= 'user='.$auth['user'].';';
		$param .= 'password='.$auth['password'];
		$db = new PDO($param);
		return $db;
	} catch (Exception $e) {
		die('Connection error : '.$e -> getMessage());
	}
}
