<?php
session_start();

$email = $_SESSION["email"]; // Make sure to sanitize and validate the email

$query = "SELECT id_user FROM users WHERE email = '$email'";
$stmt = mysqli_prepare($conexao, $query);

if ($stmt) {
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $userId);

    if (mysqli_stmt_fetch($stmt)) {
        // $userId now holds the fetched value
        // Use $userId as needed
    } else {
        // Handle fetch error
    }

    mysqli_stmt_close($stmt);
} else {
    // Handle statement preparation error
    echo "Statement Error: " . mysqli_error($conexao);
}

$_SESSION["userId"] = $userId;
?>