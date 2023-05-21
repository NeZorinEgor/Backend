<!DOCTYPE html>
<html>
<head>
    <title>Мой календарь - Задачи на конкретную дату</title>
</head>
<body>
    <h1>Мой календарь - Задачи на конкретную дату</h1>
    <form action="index.php?action=tasksByDate" method="POST">
        <label for="date">Выберите дату:</label>
        <input type="date" id="date" name="date">
        <button type="submit">Показать задачи</button>
    </form>
</body>
</html>
