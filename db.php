<?php

function read_db() {
	$f = file_get_contents("db.json") or die("unable to open database");
	return json_decode($f, true);
}

function write_db($db) {
	$f = fopen("db.json", "w") or die("unable to create database");
	fwrite($f, json_encode($db, JSON_PRETTY_PRINT));
	fclose($f);
}

function register($id, $pass) {
	$db = read_db();
	$db[$id] = [
		"password" => $pass,
		"active" => false,
		"verification_token" => md5(uniqid(mt_rand(), true)),
		"data" => [],
	];
	write_db($db);
}

function verify_login($id, $pass) {
	$db = read_db();
	if (!array_key_exists($id, $db)) {
		return false;
	}
	return $db[$id]["password"] == $pass;
}

function get_token($id) {
	$db = read_db();
	if (!array_key_exists($id, $db)) {
		return null;
	}
	return $db[$id]["token"];
}

function activate_account($id, $token) {
	$db = read_db();
	if (!array_key_exists($id, $db) || $db[$id]["token"] != $token) {
		return false;
	}
	$db[$id]["active"] = true;
	write_db($db);
	return true;
}

function store_data($id, $data) {
	$db = read_db();
	$db[$id]["data"] = $data;
	write_db($db);
}

function get_data($id) {
	$db = read_db();
	if (!array_key_exists($id, $db)) {
		return null;
	}
	return $db[$id]["data"];
}

function is_active($id) {
	$db = read_db();
	if (!array_key_exists($id, $db)) {
		return false;
	}
	return $db[$id]["active"];
}
