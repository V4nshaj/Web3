<!-- for loop default -->
<!-- foreach means looping based on the elements in collection-->
<?php
    $family = array("Jack","Ellen", "Sam","John");
    foreach($family as $key => $value){//default syntax for looping in foreach
        $family[$key] = $value . "Baugh";//doesnt print the change
        echo "Array item " . $key . " is " .$value . "<br>";//ored in the array, but the $value variable still holds the original value for the duration of the loop iteration.
        echo "Update: $family[$key] <br>";
    } 
    echo "<br><br>";
    echo "Regular for loop:<br><br>";
    for($i = 0; $i < sizeof($family); $i++) {
        echo $family[$i] . "<br>";
    }

    echo "<br><br>";

    for($i = 10; $i >= 0; $i--) {
        echo $i . "<br>";
    }//end for