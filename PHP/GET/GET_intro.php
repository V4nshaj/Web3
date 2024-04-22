<!-- techniques for passing data b/w pages:
1. GET
2. POST
-->
<!-- GET: data is encoded in the url called query string  -->
<!-- ?: seperates diiffeent page form query string
    &: seperates diff data from other data

-->
<?php
print_r($_GET);//get key word
//http://vanshajbarnwal-com.stackstaging.com/web3/php/get/?first=Vanshaj&last=Barnwal
//add the index after the question mark
//initial test 

//http://example.com/example.php?number=10.56
//Then $_GET['number'] would contain the value "10.56". It allows you to pass data to your PHP script through the URL.