<?php
session_start();


if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Просмотр задачи</title>
</head>
<body>
    <h1>Просмотр задачи</h1>
    <table>
        <tr>
            <th>Тема</th>
            <td><?= $task['topic'] ?></td>
        </tr>
        <tr>
            <th>Тип</th>
            <td><?= $task['type'] ?></td>
        </tr>
        <tr>
            <th>Место</th>
            <td><?= $task['location'] ?></td>
        </tr>
        <tr>
            <th>Дата и время</th>
            <td><?= $task['date_time'] ?></td>
        </tr>
        <tr>
            <th>Длительность</th>
            <td><?= $task['duration'] ?></td>
        </tr>
        <tr>
            <th>Комментарий</th>
            <td><?= $task['comment'] ?></td>
        </tr>
    </table>
    <a href="index.php?action=edit&id=<?= $task['id'] ?>">Редактировать</a>
</body>
</html>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e5e5e5;
        }

        a {
            color: #337ab7;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>