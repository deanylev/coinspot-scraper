<?php

// MySQL

include('sql.php');

// Return the user, or a failure indicating they aren't sign in

session_start();

if (isset($_SESSION['user'])) {
  $id = $_SESSION['user'];
  $user = $mysqli->query("SELECT * FROM coinspot_scraper.users WHERE id = '$id'")->fetch_object();
  echo json_encode((object) array('email' => $user->email, 'coins' => $user->coins));
} else {
  echo 'fail';
}
