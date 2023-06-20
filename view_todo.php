<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the specific todo from the database
    $connection = mysqli_connect('localhost', 'root', '', 'todo_db');
    $query = "SELECT * FROM todos WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!($result))
     {
     print ("<p> Query couldn't be executed </p>");
     echo mysqli_error($connection);
     echo mysqli_error($query);
     }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $todo = $row['todo'];
    } else {
        $todo = "Todo not found.";
    }

    // Close the database connection
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Todo App</h1>

        <h2>View Todo</h2>

        <div class="todo">
            <span class="todo-text"><?php echo $todo; ?></span>
        </div>

        <a href="index.php" class="btn btn-primary">Back</a>
    </div>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>
