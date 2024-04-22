<?php
$name = "John";
define("MESSAGE", "Hello friends!"); //MESSAGE is a const variable
echo "<p>My name is $name</p>";
echo "<p>I'd like to say " . MESSAGE . "</p>";
$number = 45;
$calculation = $number * 31 / 97 + 4;
echo "The result of the calcualtion is" . $calculation;
echo "The result of the calcualtion is $calculation";

$mybool = true;
echo "<p>This statement is true? $mybool </p>"; //true shows 1
$bool = false;
echo "<p>This statement is true? $bool </p>"; //false does nt show output not even 0

echo $bool ? "true" : "false";
echo "<br>";

$variablename = "name";
echo $$variablename;
