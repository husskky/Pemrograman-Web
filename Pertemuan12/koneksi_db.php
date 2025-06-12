<?php
   $conn = new mysqli('localhost', 'root', '', 'tokobuku');
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
?>
