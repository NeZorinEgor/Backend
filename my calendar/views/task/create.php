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
    <title>Создать задачу</title>
</head>
<body>
    <h1>Создать задачу</h1>
    <form method="POST" action="index.php?action=create">
        <label>Тема:</label>
        <input type="text" name="topic" required><br>
        <label>Тип:</label>
        <select name="type" required>
            <option value="встреча">Встреча</option>
            <option value="звонок">Звонок</option>
            <option value="совещание">Совещание</option>
            <option value="дело">Дело</option>
        </select><br>
        <label>Место:</label>
        <input type="text" name="location"><br>
        <label>Дата и время:</label>
        <input type="datetime-local" name="date_time" required><br>
        <label>Длительность (в минутах):</label>
                                <input type="number" name="duration" max="10080"><br>

        <label>Комментарий:</label>
        <textarea name="comment"></textarea><br>
        <input type="submit" value="Сохранить">
    </form>
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

        form {
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="datetime-local"],
        input[type="number"],
        textarea {
            width: 250px;
            padding: 5px;
            border: 1px solid #ccc;
        }

        select {
            width: 262px;
            padding: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
                                                border-radius: 5px;
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #2E4B6C;
            color: #fff;
            border: none;
            cursor: pointer;
                                                transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #FF4E1E;
        }
    </style>