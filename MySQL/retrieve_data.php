<?php
//rerieve data from database
$link = mysqli_connect('sdb-67.hosting.stackcp.net', 
'users_db-35303437b6cf', 
'phone3333', 
'users_db-35303437b6cf');//last one is database
if(mysqli_connect_error())
{
    
    die("Connection failed: " .mysqli_connect_error());//die function terminates the script execution and displays a message.
}

    $query = "SELECT * FROM Users";
    if(mysqli_query($link, $query))//$result =mysqli_query($link, $query); inside if to ignore writing this inside the if and access it directly from if
    {
        $result =mysqli_query($link, $query);
        //prints query in array form
        $row = mysqli_fetch_array($result);
        print_r($row);
        echo "<br>";
        // echo "\n";
        echo "Your email is ".$row['email']."<br>" ;
        // echo PHP_EOL;//same as \n
        print_r("Your password is ".$row[2]);
        /* echo is used for general string output, while print_r() is specifically used for displaying the contents 
        of variables, particularly arrays and objects, in a human-readable format.  */
    }

?>