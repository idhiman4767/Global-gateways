<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "project1"; // Your MySQL database name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and sanitize inputs
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);

    // Prepare SQL statement to insert data into database
    $sql = "INSERT INTO tourists (name, email) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Registered successfully. Redirecting Now...";
        // Redirect to the form page after 3 seconds
        header("refresh:1;url=index.php");
        exit; // Ensure that subsequent code is not executed after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: index.php");
    exit;
}

// Function to sanitize form inputs
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
