<?php
require 'db.php';

// Marcar tarea como realizada
if (isset($_POST['complete_task'])) {
    $taskId = $_POST['task_id'];
    $stmt = $pdo->prepare("UPDATE tasks SET completed = 1 WHERE id = :task_id");
    $stmt->execute(['task_id' => $taskId]);
}

// Borrar tarea
if (isset($_POST['delete_task'])) {
    $taskId = $_POST['task_id'];
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :task_id");
    $stmt->execute(['task_id' => $taskId]);
}

// Añadir una nueva tarea
if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $stmt = $pdo->prepare("INSERT INTO tasks (description) VALUES (:task)");
    $stmt->execute(['task' => $task]);
}

// Obtener todas las tareas
$tasks = $pdo->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .completed {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">To-Do List</h1>
        
        <form method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" name="task" class="form-control" placeholder="New Task" required>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </div>
        </form>

        <ul class="list-group">
            <?php foreach ($tasks as $task): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center 
                    <?= $task['completed'] ? 'completed' : '' ?>">
                    <?= htmlspecialchars($task['description']) ?>
                    <div>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                            <button type="submit" name="complete_task" class="btn btn-success btn-sm" <?= $task['completed'] ? 'disabled' : '' ?>>✓</button>
                        </form>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                            <button type="submit" name="delete_task" class="btn btn-danger btn-sm">✗</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
