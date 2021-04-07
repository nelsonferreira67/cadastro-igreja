<?php
$server = "localhost";
$user = "root";
$password = "";
$dbName = "cadastroieq";
$conn = mysql_connect($server,$user, $password);
$db = mysql_select_db($dbName,$conn);
