<?php

require_once 'models/TaskModel.php';

class TaskController
{
    public function index()
    {
        $tasks = TaskModel::getAllTasks();
        $listTitle = 'Все задачи';
        include 'views/task/index.php';
    }

    public function current()
    {
        $tasks = TaskModel::getTasksByStatus('текущая задача');
        $listTitle = 'Текущие задачи';
        include 'views/task/index.php';
    }

    public function overdue()
    {
        $tasks = TaskModel::getTasksByStatus('просроченная');
        $listTitle = 'Просроченные задачи';
        include 'views/task/index.php';
    }

    public function completed()
    {
        $tasks = TaskModel::getTasksByStatus('готово');
        $listTitle = 'Выполненные задачи';
        include 'views/task/index.php';

    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            TaskModel::createTask($data);
            header('Location: index.php');
        } else {
            include 'views/task/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            TaskModel::updateTask($id, $data);
            header('Location: index.php');
        } else {
            $task = TaskModel::getTask($id);
            include 'views/task/edit.php';
        }
    }

    public function show($id)
    {
        $task = TaskModel::getTask($id);
        include 'views/task/show.php';
    }

    public function markAsCompleted($id)
    {
        $task = TaskModel::getTask($id);

        if ($task['status'] !== 'готово') {
            TaskModel::markTaskAsCompleted($id);
        }

        header('Location: index.php');
    }
    public function tasksByDate()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date = $_POST['date'];
        $tasks = TaskModel::getTasksByDate($date);
        $listTitle = "Задачи на '" . $_POST['date'] . "' число";
        include 'views/task/index.php';
    } 
}

public function today()
{
    $tasks = TaskModel::getTasksForToday();
    $listTitle = 'Задачи на сегодня';
    include 'views/task/index.php';
}

public function tomorrow()
{
    $tasks = TaskModel::getTasksForTomorrow();
    $listTitle = 'Задачи на завтра';
    include 'views/task/index.php';
}

public function week()
{
    $tasks = TaskModel::getTasksByWeek();
    $listTitle = 'Задачи на текущую неделю';
    include 'views/task/index.php';
}


public function nextweek()
{
    $tasks = TaskModel::getTasksByNextWeek();
    $listTitle = 'Задачи на след. неделю';
    include 'views/task/index.php';
}



}