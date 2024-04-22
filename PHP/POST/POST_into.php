<!-- POST: data is encoded in the http request body instead of url retrieve the data from the _POST array -->
<?php
if($_POST){
    print_r($_POST);
}
?>
<form method="post">
    <p>What is your name?</p>
    <p><input type="text" name="name"></p>
    <p><input type="submit" value="Submit"></p>
</form>