<?php
$error ="";
$weather ="";
if(array_key_exists('city', $_GET))//'city' exists in the $_GET in the URL example.com?city=NewYork, $_GET['city'] would contain the value 'NewYork'.
{
    $city = str_replace(' ', '', $_GET['city']);
    //@ below supresses the error that means if a error occurs then it will not be shown
    $file_headers = @get_headers("https://www.weather-forecast.com/locations/" . 
    $city . "/forecasts/latest");
    /*get_headers() is a PHP function that retrieves the HTTP headers from a given URL.
    These headers include various information about the response, such as the server type, content type, status code, and other metadata.

For example, if the request is successful, $file_headers might contain headers like:

HTTP/1.1 200 OK: This is the status line indicating that the request was successful.
Content-Type: text/html; charset=UTF-8: This header specifies the content type of the response, indicating that it's HTML encoded in UTF-8.
Other headers like Date, Server, Content-Length, etc., which provide additional information about the response and the server.
If there's an error or the requested resource is not found, the headers might include:

HTTP/1.1 404 Not Found: This indicates that the requested resource was not found on the server.
Content-Type: text/html: The content type of the error page.
Other headers relevant to the error condition.*/
    if($file_headers[0]=='HTTP/1.1 404 Not Found')
    {
        $error = 'The city could not be found.';
    }
    else{
        $forecastPage = file_get_contents('https://www.weather-forecast.com/locations/'. $city .'/forecasts/latest');//retrieve the contents of a web page
            $pageArray = 
            explode('Weather Today</h2> (1&ndash;3 days)</div><p class="b-forecast__table-description-content"><span class="phrase">',
            $forecastPage);

         if(sizeof($pageArray) > 1) {
             $secondPageArray = explode('</span></p></td>', $pageArray[1]);

             if(sizeof($secondPageArray) > 1) {
                 $weather = $secondPageArray[0];
             }
             else {
                 $error = "That city could not be found.";
             }
         }
         else {
             $error = "That city could not be found.";
         }
        }
}
else{
    $error ='The city cold not be found.';
    
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Weather Scrapper</title>

    <style type="text/css">
    html {
        background: url('background.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    body {
        background: none;
    }

    .container {
        text-align: center;
        margin-top: 100px;
        width: 450px;

    }

    input {
        margin: 20px 0;
    }

    #weather {
        margin-top: 15px;
    }
    </style>

</head>

<body>
    <div class="container">
        <h1>What's the Weather?</h1>
        <form>
            <fieldset class="form-group">
                <label for="city">Enter the name of a city</label>
                <input type="text" class="form-control" id="city" class='city' placeholder="City" value="<?php 
                if(array_key_exists('city', $_GET))
                {
                    echo $_GET['city'];//outputs the value associated with the 'city' parameter in the URL query string example.com?city=NewYork, then $_GET['city'] will be 'NewYork', and echo $_GET['city']; will output 'NewYork' on the webpage.
                }
                ?>">
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="weather">
            <?php if ($weather) {
                echo'<div class="alert alert-success" role="alert">'.$weather.'</div>';
                
            }
            else if($error){

            echo'<div class="alert alert-danger" role="alert">' .$error. '</div>';
            }
            ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>