<?php 
DEFINE ('DB_USER', 'vishnum1998');

DEFINE ('DB_PASSWORD', 'zrrJ8zNEdpuTwuty');

DEFINE ('DB_HOST', 'localhost');

DEFINE ('DB_NAME', 'scrape');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

?>