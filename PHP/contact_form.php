<?php 
    $error = "";

    $successMessage = "";

    if($_POST) {
        if(!$_POST["email"]) {
            $error .= "An email address is required<br>";
        }

        if(!$_POST["content"]) {
            $error .= "The content field is required.<br>";
        }

        if(!$_POST["subject"]) {
            $error .= "The subject is required.<br>";
        }

        if($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "The email address is invalid.<br>";
        }

        //check if there are errors

        if($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
        }
        else {  //email address is good!
            $emailTo = "codestarsjpbaugh@gmail.com";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: " . $_POST['email'];

            //try sending the mail
            if(mail($emailTo, $subject, $content, $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, ' . 
                                'we\'ll get back to you ASAP!</div>';
            }
            else {
                $error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - try again later</div>';
            }//end if mail function succeeded or failed
        }//end else for the if $error != ""

    }//end if $_POST

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Get in touch!</h1>
        <div id="error"><?php echo $error.$successMessage; ?></div>

        <form method="post">
            <fieldset class="form-group">
                <!-- It's often used to create a visual separation or grouping of related form elements. The class attribute "form-group" is commonly used in Bootstrap to apply styling or layout to the form elements within the fieldset.-->
                <label for="email">Email address </label>
                <!-- for attribute specifies which input element it's associated with, using the ID of the input element ("email" in this case). When a user clicks on the label, it focuses the associated input field. The text inside the label ("Email address") provides a description or instruction for the input field.-->
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <!--type="email" attribute specifies that the input should be validated as an email address by the browser. The class attribute "form-control" is used in Bootstrap to apply styling to form elements, making them appear consistent and responsive.-->
                <small class="text-muted">We'll never share your e-mail with anyone else.</small>
                <!--This is a small text element displayed below the input field. It's often used to provide additional information, instructions, or disclaimers related to the input field. used in Bootstrap to apply a muted color to the text, indicating that it's less important or secondary information.-->
            </fieldset>

            <fieldset class="form-group">
                <label for="subject">Subject </label>
                <input type="text" class="form-control" id="subject" name="subject">
            </fieldset>

            <fieldset class="form-group">
                <label for="content">What would you like to ask us?</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </fieldset>

            <button type="submit" id="submit" class=" btn btn-primary">Submit</button>
        </form><!-- end of the form -->
    </div><!-- end of container div -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
    $("form").submit(function(e) {
        let error = "";

        if ($("#email").val() == "") {
            error += "The email field is required<br>.";
        }

        if ($("#subject").val() == "") {
            error += "The subject field is required.<br>";
        }

        if ($("#content").val() == "") {
            error += "The content field is required.<br>";
        }
        //test if there was an error or not

        if (error != "") {
            $("#error").html('<div class="alert alert-danger"' +
                'role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

            return false;
        } else { //no errors!
            return true;
        } //end if-else

    });
    </script>

</body>

</html>