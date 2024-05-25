<?php
/*methods for api fetching:
1. directly request data from the client side using Javascript
2. XmlHttpRequest object
3. Use application server-side Api calls
 */
/*
he API fetching method used in your code falls under the "Use application server-side API calls" category. Here's why:
Your PHP code is executed on the server-side. When the user interacts with the webpage and submits the form, the form data is sent to the server where the PHP script processes it. Inside the PHP script, you're using the file_get_contents() function to make a request to the Fruityvice API. This function is executed on the server, making it a server-side API call.
In contrast, methods like directly requesting data from the client side using JavaScript or using the XmlHttpRequest object involve making API requests directly from the client's browser without involving server-side processing. These methods are executed in the client's browser, not on the server.
 */


// api link: https://www.fruityvice.com/doc/index.html
// api link: https://www.fruityvice.com/api/fruit/all
    $urlContent = file_get_contents("https://www.fruityvice.com/api/fruit/all");

    $fruitArray = json_decode($urlContent, true);
    $error = "";
    
    if($fruitArray == null){
        $error = "No fruit available";
    }

    $fruitInfo = "";
    if(array_key_exists('fruit_name', $_GET))
    {
        $fruitName = $_GET['fruit_name'];
        $urlsingleFruit = file_get_contents("https://www.fruityvice.com/api/fruit/". $fruitName);//fruitname is given to api
        $fruitInfo = json_decode($urlsingleFruit, true);
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruityvice API</title>
</head>

<body>
    <h2>Select a fruit</h2>
    <form action="" method="get">
        /*When the form is submitted (by clicking the submit button), it submits to the same URL as the one it's
        currently on. This means that when you click the submit button, the form data is submitted to the same PHP
        script ($_SERVER['PHP_SELF']), which then processes the form data.
        Since the form is submitted to the same PHP script, when you click the submit button, the PHP script is executed
        again. Within the script, it checks if there's a 'fruit_name' in the $_GET superglobal array, and if it exists,
        it retrieves information about the selected fruit using that name. */
        <select name="fruit_name">
            <?php
                if($error =='')
                {
                    for($i=0; $i< count($fruitArray); $i++)
                    {//$i helps to retrive arrays then name is taken from that array
                        echo '<option value="' .
                            $fruitArray[$i]['name'] . '">' . 
                            $fruitArray[$i]['name'] . 
                            '</option>';
                    }
                }
                else{
                    echo "<span>Woops, no content. Error is " . $error ."</span>";
                }
?>
        </select>
        <input type="submit" value="Get fruit Info">
    </form>
    <?php
    if($fruitInfo !="")
    {
        $spaces = "&nbsp;&nbsp;&nbsp";
        echo "<h3>Fruit information for:" .$fruitInfo['name']. "</h3>";
        echo "Genus: " .$fruitInfo['genus']. "<br>";
        echo "Family: " .$fruitInfo['family']. "<br>";
        echo "Order: " .$fruitInfo['order']. "<br>";
        echo "<strong>Nutrients: </strong><br>";
        echo $spaces . "Carbs: " . $fruitInfo['nutritions']['carbohydrates'] . "<br>";
            echo $spaces . "Protein: " . $fruitInfo['nutritions']['protein'] . "<br>";
            echo $spaces . "Fat: " . $fruitInfo['nutritions']['fat'] . "<br>";
            echo $spaces . "Calories: " . $fruitInfo['nutritions']['sugar'] . "<br>"; 
    }
    ?>
</body>

</html>