<?php

// MySQL

include("sql.php");

$coins = $_POST['coins'];

// Create user session

session_start();

if (isset($_SESSION["user"])) {
  $id = $_SESSION["user"];
  $mysqli->query("UPDATE coinspot_scraper.users SET coins = '{$coins}' WHERE id = '{$id}'");
} else {
  echo "unauthorised";
}
