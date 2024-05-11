<?php
$link = mysqli_connect("sdb-67.hosting.stackcp.net", "users_db-35303437b6cf", "phone3333", "users_db-35303437b6cf");
if(mysqli_connect_error())
{
    die("The database connection failed");
}
$query1 = "INSERT INTO Users(email, password) VALUES('admin@email.com', 'admin123')";//id is not taken as it takes by default
if(mysqli_query($link, $query1))
{
    echo "Data inserted successfully!<br>";

    $query2 = "UPDATE Users SET email = 'mad@email.com' WHERE id = 2";
    if(mysqli_query($link, $query2))
    {
        echo "The data Updated successfully!";
    }
    else{
        echo "Data not updated: " . mysqli_error($link);
    }

$query = 'SELECT * FROM Users';
if($result = mysqli_query($link, $query))
{
    
    echo "<h4>Users:</h4>";

    // Fetch all rows using mysqli_fetch_all
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Print user details in a table format (HTML)
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Email</th><th>Password</th></tr>";
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>"; // Access ID column
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['password'] . "</td>"; // Display passwords with caution!
        echo "</tr>";
    }
    echo "</table>";

    mysqli_free_result($result); // Free memory used by the result set
} else {
    echo "Error selecting users: " . mysqli_error($link);
}
}
else {
    echo "Data not inserted: " . mysqli_error($link);
}
mysqli_close($link); // Close database connection
?>