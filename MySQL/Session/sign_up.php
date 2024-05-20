<?php
session_start();

$sign='';
$error ='';
$link = mysqli_connect("sdb-67.hosting.stackcp.net", "users_db-35303437b6cf", "phone3333", "users_db-35303437b6cf");
if(mysqli_connect_error())
{   
    $error = "The database connection failed";
    // die($error);
}
// Process form submission if the submit button is clicked
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $email = trim($_POST['email']);// Sanitize email (remove whitespace)
    $password = $_POST["password"];
    // Perform validation or database interaction here
    if(empty($email) || empty($password))
    {
        $error = "Please fill in both email and password fields.";
    }
    else{
        $query = "SELECT * FROM Users WHERE email = '" . mysqli_escape_string($link, $email) ."'" ;
        if($result = mysqli_query($link, $query))
        {
            if(mysqli_num_rows($result)>0)
            {
                $error = "Email already exists!";
                $_SESSION['email'] = $_POST['email'];
                    header('Location: session.php');
                mysqli_free_result($result); // Free memory used by the result set otherwise it will check again if the email exist and will show email exist when the data gets inserted
            }
            else{
                // Hash the password using bcrypt
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query1 = "INSERT INTO Users(email, password) VALUES ('" . mysqli_escape_string($link, $email) ."', '" 
                . mysqli_escape_string($link, $hashed_password) . "')";
                if(mysqli_query($link, $query1))
                {
                    $sign = "The data Updated successfully!";
                    
                    // $_SESSION['email'] = '';
                    // header('Location: session.php');
                }
                else{
                    $error = "Data not updated: " . mysqli_error($link);
                }
            }
        }
        else{
            $error = "Data not updated: " . mysqli_error($link);
        }
    }
}
else {
    // Handle non-POST requests (optional)
    $error = "Invalid request method.";
}
mysqli_close($link);mysqli_close($link); // Close the database connection (after processing)
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>

    <style type="text/css">
    html {
        background: url("background.jpg") no-repeat center center fixed;
        /* 'center center' specifies that the background image should be horizontally and vertically centered within the container
        fixed: that the background image will not scroll with the content. It will remain fixed in its position relative to the viewport */
        background-size: cover;
    }

    body {
        background: none;
    }

    .container {
        text-align: center;
        margin-top: 200px;
        /* justify-content: center; */
        width: 450px;
    }

    label {
        text-align: start;
        display: block;
    }

    input {
        margin: 10px 0;
    }

    button {
        margin-top: 20px;
    }

    #sign {
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <fieldset class="form-group">
                <label for="email">Email Address</label>
                <!-- each <label> element has a for attribute that specifies the id of the input element it is associated with
                   In this case, the <label> element is associated with the input element with the id attribute set to "email". When a user clicks on the label "Email address:", it will activate or focus the corresponding email input field. -->
                <input type="text" class="form-control" placeholder="Email Address" id="email" name="email">
            </fieldset>
            <div class="form-group">
                <label for="pwd">Password</label>
                <input type="text" class="form-control" placeholder="Password" id="pwd" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="sign">
            <?php if($sign)
            {
                echo '<div class="alert alert-success" role="alert">' .$sign.'</div>';
            }
            elseif($error){

                echo '<div class="alert alert-danger" role = "alert">'.$error.'</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>