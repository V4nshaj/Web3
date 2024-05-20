<?php
// setcookie("customerId", '1234', time()+60*60*24);// cookie named "customerId" with the value "1234" time in sec so 
//time()+60*60*24: The expiration time of the cookie, calculated as the current time (returned by time()) plus 24 hours (60 seconds * 60 minutes * 24 hours).
//------>setcookie once set & comment out it will show the value till 24 hrs which is described earlier
echo $_COOKIE["customerId"];// print the value of the "customerId" cookie that was just set. 
/*when you run this code, it sets a cookie named "customerId" with the value "1234" that will expire in 24 hours. Then it 
tries to echo out the value of the "customerId" cookie. If you access this PHP script through a web browser, you should see
 "1234" printed on the screen as the output, assuming cookies are enabled in your browser. */
?>