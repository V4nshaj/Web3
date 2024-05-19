<?php
$link = mysqli_connect("sdb-67.hosting.stackcp.net", "users_db-35303437b6cf", "phone3333", "users_db-35303437b6cf");
if(mysqli_connect_error())
{
    die("The database connection failed");
}

// $query = 'SELECT * FROM Users';
// $query = "SELECT * FROM Users WHERE email LIKE '%@email.com'";// like checks and print the contan string
// $query = "SELECT * FROM Users WHERE email LIKE '%p%'";// like checks and print the contan p
// $query = 'SELECT * FROM Users WHERE id =1';//print query with id =1
// $query = 'SELECT email FROM Users WHERE id >=2 AND email LIKE %w%';//print query with id >=2 and email which has w
$name = 'John robin';
// $query ="SELECT * FROM Users WHERE name = '". $name."'";//searches the variable
/*The value of $name is directly inserted into the SQL query string. If the $name variable contains any malicious SQL code, 
it will be executed as part of the query. This makes your code vulnerable to SQL injection attacks. For example, 
if $name contains something like ' OR 1=1 --, SELECT * FROM Users WHERE name = '' OR 1=1 --
And this would return all rows from the Users table, effectively bypassing any intended restrictions.*/
$query ="SELECT * FROM Users WHERE name = '". mysqli_real_escape_string($link, $name)."'";
/*The mysqli_real_escape_string() function is used to escape special characters in a string for use in an SQL statement. 
This function ensures that any special characters in the $name variable are properly escaped This helps prevent SQL 
injection attacks because even if the $name variable contains malicious SQL code, it will be treated as a normal string 
rather than executable SQL code*/
if($result = mysqli_query($link, $query))
{
    
    while($row = mysqli_fetch_array($result))
    {
        print_r($row);
    }
    

    mysqli_free_result($result); // Free memory used by the result set
} 
else {
    echo "Error selecting users: " . mysqli_error($link);
}
mysqli_close($link); // Close database connection
?>