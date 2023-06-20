<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the todo from the database
    $connection = mysqli_connect('localhost', 'root', '', 'todo_db');
    $query = "DELETE FROM todos WHERE id = $id";
    mysqli_query($connection, $query);

    // Close the database connection
    mysqli_close($connection);

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>
