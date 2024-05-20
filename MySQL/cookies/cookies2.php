<?php
// setcookie("customerId", '1234', time()+60*60*24);
// setcookie("customerId", "", time()-60*60);//deletes the cookie named "customerId".
/*time()-60*60: This sets the expiration time of the cookie to the past, effectively expiring the cookie immediately. time()
 returns the current Unix timestamp (i.e., the number of seconds since the Unix Epoch, January 1 1970 00:00:00 UTC), and 
 subtracting 60*60 (which is 3600, or one hour in seconds) from it means the cookie is set to expire one hour ago. */
/*setcookie("customerId", "", time()-60*60);, you're instructing the browser to delete the "customerId" cookie by setting 
its expiration time to a time in the past. This effectively removes the cookie from the browser's storage. */
setcookie("customerId", "", time()+60*60);
//expires the cookie after one hour.
$_COOKIE['customerId']='test';//assign a value to the $_COOKIE['customerId']
 echo $_COOKIE['customerId'];
?>