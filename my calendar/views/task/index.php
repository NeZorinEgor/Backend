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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Мой календарь</title>
</head>
<body>

<div style="display: flex; justify-content: space-between; align-items: center;">
  <h1>Мой календарь</h1>
  <a href="login.php"><button class="my-button">Выход</button></a>
</div>
    <?php if (isset($listTitle)): ?>
        <h3><?= $listTitle ?></h3>
    <?php endif; ?>

    <button class="my-button">
    <a href="index.php?action=create" style="color: inherit; text-decoration: none;">Создать задачу</a>
</button>



<div style="display: flex; align-items: center;">
  <select onchange="location = this.value;" style="margin-right: 10px; background-color: #F5F5F5; padding: 5px; height: 30px; border-color: #F5F5F5;">
    <option value="">Выберите раздел</option>
    <option value="index.php?action=index">Все задачи</option>
    <option value="index.php?action=current">Текущие задачи</option>
    <option value="index.php?action=overdue">Просроченные задачи</option>
    <option value="index.php?action=completed">Выполненные задачи</option>
  </select>

<form action="index.php?action=tasksByDate" method="POST" style="margin-right: 10px;">
    <label for="date"></label>
    <input type="date" id="date" name="date" style="margin-right: 10px; background-color: #F5F5F5; padding: 5px; height: 30px; border-color: #F5F5F5;">
    <button class="my-button">Поиск</button>
  </form>

  <a href="index.php?action=today" style="margin-right: 10px;">Сегодня</a>
  <a href="index.php?action=tomorrow" style="margin-right: 10px;">Завтра</a>
  <a href="index.php?action=week" style="margin-right: 10px;">На эту неделю</a>
  <a href="index.php?action=nextweek">На след. неделю</a>
</div>


<br><br>

<table>
  <tr>
    <th>Тема</th>
    <th>Тип</th>
    <th>Место</th>
    <th>Дата и время</th>
    <th>Длительность</th>
    <th>Комментарий</th>
    <th>Статус</th>
    <th>Действия</th>
  </tr>
  <script>


  const form = document.querySelector('form');
  const dateInput = document.getElementById('date');
  const dateError = document.getElementById('date-error');

  form.addEventListener('submit', function(event) {
    if (!dateInput.value) {
      event.preventDefault();
      dateError.style.display = 'block';
    } else {
      dateError.style.display = 'none';
    }
  });
</script>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['topic'] ?></td>
                <td><?= $task['type'] ?></td>
                <td><?= $task['location'] ?></td>
                <td><?= $task['date_time'] ?></td>
                <td><?= $task['duration'] ?></td>
                <td><?= $task['comment'] ?></td>
                <td><?= $task['status'] ?></td>
                <td>
                    <a href="index.php?action=show&id=<?= $task['id'] ?>">Просмотр</a> |
                    <a href="index.php?action=edit&id=<?= $task['id'] ?>">Редактировать</a> |
                    <?php if ($task['status'] !== 'готово'): ?>
                        <a href="index.php?action=markAsCompleted&id=<?= $task['id'] ?>">Готово</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<style>

  form{
  margin-bottom:10px;
  }
body {
    padding: 20px;
    font-family: Arial, sans-serif;
}

h1 {
    margin-top: 0;
}

.my-button {
		margin-top: 10px;
    display: inline-block;
    padding: 4px 16px;
    background-color: #2E4B6C;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s ease;

}

.my-button:hover {
    background-color: #FF4E1E;
}

.select-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.select-container select {
    margin-right: 10px;
		
    padding: 8px;
    border: 1x solid #ccc;
    border-radius: 4px;
}

.search-form {
    margin-left: 10px;
    margin-bottom: 10px;
}

.search-form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.search-form input[type="date"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.search-form button {
    padding: 8px 12px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th,
table td {
    padding: 8px;
    border: 1px solid #ccc;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.error-message {
    color: red;
    display: none;
    margin-top: 5px;
    font-size: 14px;
    margin-bottom: 10px;
}


  a {
    color: #4285F4;
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  a:hover {
    color: #FF5722;
    text-decoration: underline;
  }
  
  /* Анимация при наведении */
  a span {
    display: inline-block;
    transition: transform 0.3s ease;
  }
  
  a:hover span {
    transform: translateY(-3px);
  }
</style>