<?php
// Establish a connection to your MySQL database (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ebooks";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect form data
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $feedback = $conn->real_escape_string($_POST["feedback"]);

    // Insert feedback into the database
    $sql = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your feedback, $name!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // If the form is not submitted through POST, redirect to the form page
    header("Location: feedback_form.html");
    exit();
}

// Close the database connection
$conn->close();
?>
