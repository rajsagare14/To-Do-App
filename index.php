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

        <form action="add_todo.php" method="POST">
            <input type="text" name="todo" placeholder="Enter a new todo">
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <h2>Todo List</h2>

        <?php
        // Fetch todos from the database
        $connection = mysqli_connect('localhost', 'root', '', 'todo_db');
        $query = "SELECT * FROM todos";
        $result = mysqli_query($connection, $query);

        // Display todos
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="todo">';
                echo '<span class="todo-text">' . $row['todo'] . '</span>';
                echo '<a href="view_todo.php?id=' . $row['id'] . '" class="btn btn-info">View</a>';
                echo '<a href="delete_todo.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>';
                echo '</div>';
            }
        } else {
            echo '<p>No todos found.</p>';
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

    </div>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
</body>
</html>
