<?php
$conn = new mysqli("localhost","root","","projektwww");
if ($conn->connect_error) {
  exit("Connection failed: " . $conn->connect_error);
  }
?>