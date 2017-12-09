<?php

// MySQL

include('sql.php');

// Create user if they don't exist

$email = $_POST['email'];
$password = md5($_POST['password']);
$query = $mysqli->query("SELECT * FROM coinspot_scraper.users WHERE email = '{$email}' AND password = '{$password}'");

if (!$query->num_rows) {
  //$mysqli->query("INSERT INTO coinspot_scraper.users (email) VALUES ('{$email}')");
  echo "Invalid credentials.";
} else {
  // Create user session
  session_start();
  $_SESSION['user'] = $query->fetch_object()->id;
  echo "success";
}
