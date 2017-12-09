<?php

// MySQL

include('sql.php');

// Create user if they don't exist

$email = $_POST['email'];

if (!$mysqli->query("SELECT * FROM coinspot_scraper.users WHERE email = '{$email}'")->num_rows) {
  $mysqli->query("INSERT INTO coinspot_scraper.users (email) VALUES ('{$email}')");
}

// Create user session

session_start();

$_SESSION['user'] = $mysqli->query("SELECT * FROM coinspot_scraper.users WHERE email = '{$email}'")->fetch_object()->id;
