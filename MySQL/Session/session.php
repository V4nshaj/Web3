<?php
session_start();
/*session_start();: This function starts or resumes a session. Sessions in PHP allow you to store data that persists across 
multiple requests made by the same client (e.g., a user's browser). It's typically the first thing you'll do if you want to 
work with session data in your PHP scripts. */
// $_SESSION['username'] = 'JohnBaugh';//once stored it will echo the bellow as it remembers the data
/*$_SESSION['username'] = 'JohnBaugh';: This line sets a session variable named 'username' and assigns it the value 
'JohnBaugh'. Session variables are stored on the server and can be accessed across multiple pages as long as the session 
is active. In this case, you're storing the username 'JohnBaugh' in the session variable 'username' */

if(empty($_SESSION['email']))
{
    //if echo or print it will not go to index stays on session file
  header('Location: index.php');
  exit(); // Exit after sending the header
}
else{
  echo "Welcome! you are logged in!";
}
?>