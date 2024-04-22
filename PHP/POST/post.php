<?php
    if($_POST) {
        $family = array("Henry", "Ellen", "Jackson", "John");

        $isKnown = false;  

        foreach($family as $value) {
            if($value == $_POST['name']) {
                $isKnown = true;
                break;
            }
        }//end foreach

        if($isKnown) {
            echo "Hi there, " . $_POST['name'] . "!<br>";
            if($_POST['age']) {
                echo "You are " . $_POST['age'] . " years old<br>";
            }
        }
        else {
            echo "I don't know you!";
        }
    }//if post exists
?>

<form method="post">
    <p>What is your name?</p>

    <p><input type="text" name="name"></p>
    <p><input type="text" name="age"></p>
    <p><input type="submit" value="Submit"></p>
</form>