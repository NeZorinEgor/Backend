<?php

class TaskModel
{
    public static function getAllTasks()
    {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM tasks');
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Обновление статуса задачи на "Просроченная", если дата задачи просрочена
        $currentDateTime = date('Y-m-d H:i:s');
        foreach ($tasks as &$task) {
            if ($task['date_time'] < $currentDateTime && $task['status'] !== 'готово') {
                $task['status'] = 'просроченная';
                self::updateTaskStatus($task['id'], $task['status']);
            }
        }

        return $tasks;
    }

    public static function getTasksByStatus($status)
    {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM tasks WHERE status = ?');
        $stmt->execute([$status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function createTask($data)
    {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO tasks (topic, type, location, date_time, duration, comment)
            VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$data['topic'], $data['type'], $data['location'], $data['date_time'],
            $data['duration'], $data['comment']]);
    }

    public static function updateTask($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE tasks SET topic = ?, type = ?, location = ?, date_time = ?,
            duration = ?, comment = ? WHERE id = ?');
        $stmt->execute([$data['topic'], $data['type'], $data['location'], $data['date_time'],
            $data['duration'], $data['comment'], $id]);
    }

    public static function markTaskAsCompleted($id)
    {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE tasks SET status = ? WHERE id = ?');
        $stmt->execute(['готово', $id]);
    }

    public static function getTask($id)
    {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM tasks WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function updateTaskStatus($id, $status)
    {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE tasks SET status = ? WHERE id = ?');
        $stmt->execute([$status, $id]);
    }
    public static function getTasksByDate($date)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM tasks WHERE DATE(date_time) = ?');
    $stmt->execute([$date]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



    public static function getTasksForToday()
    {
        $today = date('Y-m-d');
        return self::getTasksByDate($today);
    }

    public static function getTasksForTomorrow()
    {
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        return self::getTasksByDate($tomorrow);
    }



public static function getTasksByWeek()
{
    $startDate = strtotime('last Monday');
    $endDate = strtotime('+1 week', $startDate);

    $tasks = array();

    while ($startDate < $endDate) {
        $currentDate = date('Y-m-d', $startDate);
        $tasksForDate = self::getTasksByDate($currentDate);
        $tasks = array_merge($tasks, $tasksForDate);

        $startDate = strtotime('+1 day', $startDate);
    }

    return $tasks;
}




    public static function getTasksByNextWeek()
    {
    $startDate = strtotime('this Monday');
    $endDate = strtotime('+1 week', $startDate);

    $tasks = array();

    while ($startDate < $endDate) {
        $currentDate = date('Y-m-d', $startDate);
        $tasksForDate = self::getTasksByDate($currentDate);
        $tasks = array_merge($tasks, $tasksForDate);

        $startDate = strtotime('+1 day', $startDate);
    }

    return $tasks;
    }








}
