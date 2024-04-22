<?php

if($_GET)
{
    echo $_GET['number'];
}
?>
<p>Please enter a whole number</p>
<form method="GET">
    <input name="number" type="text">
    <input type="submit" value="GO!">
</form>