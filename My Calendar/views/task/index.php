<?php
session_start();


if (!isset($_SESSION['email'])) {
    header('Location: view/user/login.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: view/user/login.php');
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

        <th><a href="login.php">Выход</a></th>
    <h1>Мой календарь</h1>
    <?php if (isset($listTitle)): ?>
        <h3><?= $listTitle ?></h3>
    <?php endif; ?>

    <button class="my-button">
    <a href="index.php?action=create" style="color: inherit; text-decoration: none;">Создать задачу</a>
</button>



    <div style="display: flex; align-items: center;">
  <select onchange="location = this.value;">
    <option value="">Выберите раздел</option>
    <option value="index.php?action=current">Текущие задачи</option>
    <option value="index.php?action=overdue">Просроченные задачи</option>
    <option value="index.php?action=completed">Выполненные задачи</option>
  </select>

  <form action="index.php?action=tasksByDate" method="POST" style="margin-left: 10px;">
    <label for="date"></label>
    <input type="date" id="date" name="date">
    <button type="submit">Поиск</button>
  </form>

  |<a href="index.php?action=today" style="margin-left: 10px;">Сегодня</a>|
  <a href="index.php?action=tomorrow" style="margin-left: 10px;">Завтра</a>|
  <a href="index.php?action=week" style="margin-left: 10px;">На эту неделю</a>|
  <a href="index.php?action=nextweek" style="margin-left: 10px;">На след. неделю</a>|
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
    .my-button {
            display: block;
            width: 140px;
            padding: 5px;
            background-color: #337ab7;
            color: #ffffff;
            border: none;
            margin-bottom: 1%;

            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        table {
            place-content: ;
            width: 100%;
            border-collapse: collapse;

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