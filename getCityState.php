<?php
// getCityState.php
//  Gets the form value from the "zip" widget, looks up the
//  city and state for that zip code, and prints it for the
//  form

  $con = mysqli_connect("127.0.0.1",'root','rxpost123', 'ecrocs');
  if(!$con){
    echo 'Error connecting to server';
  }
  
  $zip = $_GET["zip"];

  $zip_sql_query = "SELECT * FROM zip_codes WHERE zip = {$zip};";
  $zip_sql = mysqli_fetch_assoc(mysqli_query($con, $zip_sql_query));

  print("{$zip_sql['city']}, {$zip_sql['state']}");
?>
