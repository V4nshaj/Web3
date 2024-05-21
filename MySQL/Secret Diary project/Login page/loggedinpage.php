<?php
session_start();
    if(array_key_exists('id', $_COOKIE))
    {/* used for scenarios where the user has chosen to stay logged in, and their ID is stored in a cookie to automatically 
        log them in on subsequent visits without requiring them to re-enter their credentials. */
        $_SESSION['id'] = $_COOKIE['id'];
    }
    if(array_key_exists('id', $_SESSION))
    {
        /*checks if the 'id' key exists in the $_SESSION superglobal. If it does, it means the user is logged in. If the 
        user is logged in ($_SESSION['id'] exists), it displays a message indicating that the user is logged in, along with 
        a link to log out (index.php?logout=1). */
        echo "<p>Logged In! <a href='index.php?logout=1'>Log out!</a></p>";
        // echo "<p>Logged In! <a href='index.php?logout = 1'>Log out!</a></p>"; dont put space in between logout = 1
       
    }
    else{
        /*If the user is not logged in (the 'id' key doesn't exist in $_SESSION), it redirects them to the login page
         (index.php) using the header() function. */
        header("Location: index.php");
    }
?>