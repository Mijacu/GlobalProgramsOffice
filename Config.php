<?php

define('DB_SERVER', 'ilinkserver.cs.utep.edu');
define('DB_USERNAME', 'cs_ucastro');
define('DB_PASSWORD', 'SecretPassword'); //I trust in you team
define('DB_DATABASE', 'f18_team9');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>