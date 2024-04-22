<?php

    $myArray = array("John", "Ed", "Sally", "Tom");

    print_r($myArray); //we cant echo as echo does for string

    echo $myArray[2];

    echo "<br><br>";

    $foodArray = array();


    $foodArray[0] = "pizza";
    $foodArray[1] = "hamburger";
    $foodArray[2] = "tea";

    $foodArray[] = "fudge";//adds as the third element

    $foodArray["myFavoriteFood"] = "ice cream";//adds as the element with key myfavouriteFood

    print_r($foodArray);

    $languages = array(//array same as prev
        "France" => "French",
        "Germany" => "German",
        "USA" => "English"
    );

    echo "<br><br>";

    print_r($languages);//prints the array

    unset($languages["France"]);//unset deletes the array element

    echo "<br><br>";
    print_r($languages); 

    echo "<br><br>";
    echo sizeof($languages); //prints the size of the array

    //challenge solution:

    $movies = array("Star Trek: First Contact", "Independence Day", "Avengers: End Game");

    print_r($movies);

    echo sizeof($movies);



?>