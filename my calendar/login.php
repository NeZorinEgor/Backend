<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Вход</h2>
    <form method="post" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Войти">
        <p>Еще не зарегистрированы? <a href="register.php">Зарегистрируйтесь здесь</a>.</p>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Подключаемся к базе данных
            $db = new PDO('mysql:host=127.0.0.1:3306;dbname=my_calendar12340', 'my_calendar12340', 'dso5Jq0m');
                    // Проверяем наличие пользователя в базе данных
        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Аутентификация успешна
            session_start();
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit();
        } else {
            echo '<p class="message">Неверные учетные данные</p>';
        }
    }
?>
</body>
</html>
    <style>
.message {
            text-align: center;
        }
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #333333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #333333;
    font-weight: bold;
}

input[type="email"],
input[type="password"] {
    width: 94%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #cccccc;
    border-radius: 5px;
}

input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #2E4B6C;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
		transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #FF4E1E;
}

p {
    margin-top: 20px;
    font-size: 14px;
    color: #666666;
}

a {
    color: #337ab7;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>