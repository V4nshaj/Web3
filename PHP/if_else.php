<?php
    $user = "rob";

    if($user == "john") {
        echo "Hello John!";
    }
    else {
        echo "I don't know you!";
    }

    echo "<br><br>";

    $age = 19;

    if($age >= 21) {
        echo "Here, have a beer!<br>";
    }
    else {
        echo "Here, have a Coca-Cola!<br>";
    }

    if($age >= 21 && $user == "john") {
        echo "Welcome to the People Named John over 21 Club!<br>";
    }
    else {
        echo "Sorry, you aren't named John, or you're not 21 yet!<br>";
    }

    if($user == "rob" || $age >= 21) {
        echo "Welcome!<br>";
    }
    else {
        echo "Sorry you have to be named Rob, or at least 21 to enter!<br>";
    }


    //challenge solution
    if($user == "rob" || $user == "john" || $user == "ed") {
        echo "Welcome to the Society of Awesome People!<br>";
    }
    else {
        echo "Sorry, but you aren't allowed in this club.<br>";
    }
?>