<?php
session_start(); // Start or resume a session

include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($check_email_sql);
    if ($result->num_rows > 0) {
        // Email already exists, display alert and redirect back to signup page
        echo "<script>alert('Email already exists. Please choose a different email.');</script>";
        echo "<script>window.location.href = 'signup.php';</script>";
        exit(); // Make sure to exit after redirection
    } else {
        // Email is unique, proceed with the signup process
        $insert_sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        if ($conn->query($insert_sql) === TRUE) {
            // Signup successful, clear any existing session data
            $_SESSION = array(); // Clear all session variables
            session_destroy(); // Destroy the session

            // Start a new session and redirect to the dashboard
            session_start();
            header("Location: index.php"); // Redirect to index.php (formerly login.php)
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
