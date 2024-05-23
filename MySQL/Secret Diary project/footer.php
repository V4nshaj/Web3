<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $("#login-anchor").click(function(e) {
        e.preventDefault();
        $("#signup-text").hide();
        $("#signup").hide();
        $("#login-text").show();
        $("#login").show();
        $("#login-link").hide();
        $("#signup-link").show();
    });

    $("#signup-anchor").click(function(e) {
        e.preventDefault();
        $("#signup-text").show();
        $("#signup").show();
        $("#login-text").hide();
        $("#login").hide();
        $("#signup-link").hide();
        $("#login-link").show();
    });
});

$("#diary").bind('input propertychange', function() {
    /*binds an event handler function to two events: input and propertychange. The input event is triggered whenever the value of the textarea changes, and the propertychange event is triggered when a property of the element changes */
    $.ajax({
        /*jQuery method that performs an asynchronous HTTP (Ajax) request. It sends data to the server and receives the response.
        method: "POST": Specifies that the HTTP request method is POST, which is commonly used for submitting data to a server.
        url: "updatedatabase.php": Specifies the URL of the server-side script (updatedatabase.php) that will handle the request.
        data: { content: $("#diary").val() }: This specifies the data to be sent to the server. It sends the current value of the textarea (#diary) as the content parameter. */
        method: "POST",
        url: "updatedatabase.php",
        data: {
            content: $("#diary").val()
        }
    });
});
</script>
</body>

</html>