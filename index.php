<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Residence Management</title>
</head>
<body>
    <h1>Student Residence Management</h1>

    <?php 
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    // Select all records from User table
    $sql = "SELECT * FROM User";
    $result = mysqli_query($conn, $sql);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "User ID: " . $row["UserID"] . "<br>";
            echo "Username: " . $row["Username"] . "<br>";
            echo "First name: " . $row["FirstName"] . "<br>";
            echo "Last name: " . $row["LastName"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "0 results";
    }

    ?>
    <div>
        <ul><a href = "viewhouse.php">View houses currently in the database</a></ul>
        <ul><a href = "addhouse.php"> Add new house to the database</a></ul>
        <ul><a href = "edithouse.php">Edit house in the database</a></ul>
        <ul><a href = "deletehouse.php">Delete a house from the database</a></ul>
    </div>
</body>
</html>