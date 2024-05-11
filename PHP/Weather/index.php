<?php
$error = "";
$location="";
if(isset($_POST['city']))
{
    $city = $_POST['city'];
    $url = "https://www.weather-forecast.com/locations/" . urlencode($city) . "/forecasts/latest";
    $content = file_get_contents($url);
    echo $content;
    
}
else{
    echo "The city could not be found";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Scraper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    body {
        background-position: center -200px;
        /* Center horizontally, shift top */
        background-repeat: no-repeat;
        /* Prevent image tiling */
        background-size: cover;
        /* Ensure image covers the entire viewport */
    }
    </style>
</head>

<body class="d-flex min-vh-100" style="background-image: url('background.jpg');">
    <!--body will always haave a minimum height of equal to view port height i.e 100 is full 100%-->
    <div class="container">
        <div class="row justify-content-center align-items-center g-lg-5 mt-5">
            <div class="col-md-10 mx-auto text-center col-lg-4">
                <!--col-lg-5-->
                <h1>What's The Weather?</h1>
                <p>Enter the name of the city.</p>
                <form id="weather-form" method="post">
                    <fieldset class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control form-control-md " id="city" name="city">
                        <!-- <input type="submit" class="form-control"> -->
                    </fieldset>
                    <button type="submit" id="submit" class="btn btn-primary mt-3">Submit</button>
                    <!--btn-primaary is a color blue in bootstrap-->
                </form>
                <div id="weatherData"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#weather-form").submit(function(e) {
            e.preventDefault();
            var city = $("#city").val();
            $.ajax({
                type: 'POST',
                url: window.location.href, // Change the URL to the current page
                data: {
                    city: city
                },
                success: function(response) {
                    $('#weatherData').html(response);
                    $('#weatherData').nextAll('#weather-form').remove();
                },
                error: function() {
                    $('#weatherData').html("Error: Could not retrieve weather data.");
                }
            });
        });
    });
    </script>

</body>

</html>