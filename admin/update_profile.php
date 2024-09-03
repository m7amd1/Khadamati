<?php
include("../connection.php");

// Update Profile
if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $city = $_POST['city'];

    // Update record values in the database
    $update_query = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', password='$password', phone_number='$phone_number', city='$city' WHERE email='$email'";
    if ($database->query($update_query) === TRUE) {
        header("Location: ./index.php");
        exit;
    } else {
        echo "Error updating record: " . $database->error;
    }
}
