<?php
session_start();
$error='';
$sign = '';

/*When the "logout" parameter is present in the GET request (i.e., when the user wants to log out), it unsets the session and deletes the "id" cookie, effectively logging the user out.
session_unset() clears all session variables.
setcookie("id", "", time()-60*60) sets an empty value for the "id" cookie with an expiration time in the past, effectively deleting the cookie.
$_COOKIE["id"] = "" also sets the "id" cookie to an empty value to ensure it's cleared.
 */
if(array_key_exists("logout", $_GET)){
    session_unset();
    setcookie("id", "", time()-60*60);
    $_COOKIE["id"] = "";
}
else if(array_key_exists("id", $_SESSION) OR array_key_exists("id", $_COOKIE))
{
    
    header("Location: loggedinpage.php");
}

include('connection.php');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = trim($_POST['email']);
    $password = $_POST['pwd'];
    if(empty($email) && empty($password))
    {
        $error = "There were errors in your form!<br><br>An email address is required.<br>A password is required.";
      
    }
    else if(empty($email))
    {
        $error = "There was error(s) in your form!<br><br>An email address is required.";

    }
    else if(empty($password))
    {
        $error = "There was error in your form!<br><br>A password is required.";
       
    }
    else{
        if (isset($_POST['signup'])) {  // Signup button clicked
            $query = "SELECT * FROM Users WHERE email = '" .mysqli_escape_string($link, $email) . "'";
            if($result = mysqli_query($link, $query))
            {
                if(mysqli_num_rows($result)>0)
                {
                    $error = "The email address already exist please login!";
              
                }
                else{
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashing the password
                        $query1 = "INSERT INTO Users(email, password) VALUES ('" . mysqli_escape_string($link, $email) ."', '" 
                        . mysqli_escape_string($link, $hashed_password) . "')";
                        if(mysqli_query($link, $query1))
                        {
                            $id= mysqli_insert_id($link);/*function retrieves the ID generated by a query on a table with a
 column having the AUTO_INCREMENT attribute. In this case, it retrieves the ID of the last inserted row in the database 
 associated with the MySQLi connection represented by $link.*/
                            $_SESSION["id"] = $id;
                            
                            if(isset($_POST['staylogged']) && $_POST['stayLoggedIn'] == '1' )//checks if the 'staylogged' checkbox was checked in the form submission. If it was checked, it means the user wants to stay logged in even after closing the browser.
                            {
                                setcookie("id", $id, time()+60*60*24*365);  
                            }
                            // $sign = "The data Updated successfully!";
                            // echo $sign;
                            header("Location: loggedinpage.php");
                        }
                        else{
                            $error = "Data not updated & not signed up: " . mysqli_error($link);
                        
                        }
                }
            }
        }
        else if (isset($_POST['login'])) { // Login button clicked
            $query2 = "SELECT * FROM Users WHERE email = '" .mysqli_escape_string($link, $email) . "'";
            if($result = mysqli_query($link, $query2))
            {
                if(mysqli_num_rows($result)>0)
                {
                    $user = mysqli_fetch_assoc($result);//returns the array of selected query
                    if(password_verify($password, $user['password']))
                    // if($password) 
                        {
                            $id= $user['id'];//returns the array of selected query
                            $_SESSION["id"] = $id;
                            /*$_SESSION["id"] is used to store the user's ID on the server-side, typically after a successful login.
This allows you to maintain the user's login status across different pages during their session on the website. */
                            if(isset($_POST['stayloggedIn']) && $_POST['stayLoggedIn'] == '1')
                            {
                                setcookie("id", $id, time()+60*60*24*365);  
                            }
                            // $sign = "Loged In successfully!";
                            // echo $sign;//if echoed it does header does not goes to another web page
                            header("Location: loggedinpage.php");
                        }
                        else{
                            $error = "Incorrect password!";
                           
                        }
                    }
                    else{
                    $error = "The email address does not exist please signup!";
               
                }
            }
          } else {
            // Invalid request (neither signup nor login button clicked)
            $error = "Invalid request method login.";
           
          }
    }
}
mysqli_close($link); // Close the database connection (after processing)

?>
<?php include('header.php'); ?>
<div class="container" id="homepage">
    <h1>Secret Dairy</h1>
    <p>Store your thoughts permanently and Securely</p>
    <p id="signup-text">Interested? Sign up now!</p>
    <p id="login-text" style="display: none;">Log in using your username and password</p>
    <form action="" class="col" method="post">
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
        </div>

        <div class="form-group">
            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password">
        </div>

        <div class="form-check">
            <label for="">Stay Logged In<input type="checkbox" class="form-check-input" value="1"
                    name="stayLoggedIn"></label>
        </div>
        <div class="colum">
            <button type="submit" class="btn btn-success" name="signup" id="signup">Sign Up!</button>
            <button type="submit" class="btn btn-success" name="login" id="login" style="display: none;">Log
                In</button>
            <p id="login-link"><a class="linked" href="#" id="login-anchor">Log In</a></p>

            <p id="signup-link" style="display: none;"><a class="linked" href="#" id="signup-anchor">Sign up</a></p>
        </div>
    </form>
    <div id="error" class="row justify-content-center">
        <?php
            if ($error) {
                echo "<div class='alert alert-danger' role='alert' style='width: fit-content;'>$error</div>";
        
            }
            ?>
    </div>
</div>

<?php include('footer.php');