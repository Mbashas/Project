<?php
require 'shopping-cart/config.php';
function generateUserId() {
    $letters = range('A', 'Z'); // Get all uppercase letters
    $randomLetters = $letters[array_rand($letters)] . $letters[array_rand($letters)];
    $randomNumber = rand(0, 9);
    return $randomLetters . $randomNumber;
}

$id = generateUserId();
$role = "admin"; // Define the role
$username = "mbasha"; // Make sure it's unique
$password = "seth"; // Get this securely - DO NOT HARDCODE
$name = "Seth"; 

// --- Hash the password ---
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// --- SQL query with placeholders ---
$sql = "INSERT INTO Users (id, role, username, password, name) VALUES (?, ?, ?, ?, ?)";

// --- Prepare and execute the statement ---
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $id, $role, $username, $hashed_password, $name); 


if ($stmt->execute()) {
    echo "New user created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// --- Close the statement and connection ---
$stmt->close();
$conn->close();
?>