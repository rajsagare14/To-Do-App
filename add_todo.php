<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $todo = $_POST['todo'];

    // Insert the new todo into the database
    $connection = mysqli_connect('localhost', 'root', '', 'todo_db');
    $query = "INSERT INTO todos (todo) VALUES ('$todo')";
    mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>
