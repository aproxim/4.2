<?php
require_once 'Task.php';
$task = new Task;
$allTasks = $task->getAllTasks();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task</title>
</head>
<body>
<div id="wrapper">
    <div class="tasks">

        <?php if ($allTasks->rowCount() === 0): ?>
            
            <p>Вы пока не добавили ни одной задачи</p>
        <?php else: ?>

            <table>
                <tr>
                    <td>Задача</td>
                    <td>Статус</td>
                    <td>Дата добавления</td>
                    <td>Действия</td>
                </tr>
                <?php foreach ($allTasks as $task): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($task['description']) ?></td>
                        <?php echo htmlspecialchars($task['is_done']) ? '<td>Выполнено</td>' : '<td>В процессе</td>' ?>
                        <td><?php echo htmlspecialchars($task['date_added']) ?></td>
                        <td>
                            <p class='edit link'>Изменить </p>
                            <?php if (!$task['is_done']): ?>
                                <p class='done link'>Выполнить</p>
                            <?php endif; ?>
                            <p class='delete link'>Удалить </p>
                            <input type="hidden" value="<?php echo $task['id'] ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

    </div>

    <div class="forms">
        <form method="POST" class="addTaskForm">
            <textarea name="task" placeholder="Задача" id="task" cols="40" rows="5" required></textarea>
            <input type="submit" name="addTask" value="Добавить задачу" class="button">
        </form>
    </div>
</div>
</body>
</html>