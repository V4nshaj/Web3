<?php

mysqli_connect('sdb-67.hosting.stackcp.net', 'users_db-35303437b6cf', 'phone3333');//server then database/user name last passeord
if( !mysqli_connect_error())//to show error while connecting
{
    echo "Database connection successful";
    
}
else{
    echo "There was a error connecting database ";
    echo mysqli_connect_error();

}
?>