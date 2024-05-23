<?php
$link = mysqli_connect('sdb-69.hosting.stackcp.net', 
'secret-diary-353035318acd', 
'phone3333', 
'secret-diary-353035318acd');
if(mysqli_connect_error())
{   
    $error = "The database connection failed" . mysqli_connect_error();
    die($error);
}

?>