<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Регистрация</h2>
    <form method="post" action="register.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Пароль:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Зарегистрироваться">
         <p>Уже зарегистрированы? <a href="login.php">Войдите здесь</a>.</p>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Подключаемся к базе данных
            $db = new PDO('mysql:host=127.0.0.1:3308;dbname=ADMINISTRATION', 'ADMINISTRATOR', 'ADMINISTRATOR');

            // Проверяем, существует ли пользователь с таким email
            $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo '<p class="message">Пользователь с таким email уже существует</p>';
            } else {
                // Вставляем нового пользователя в таблицу users
                $stmt = $db->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
                $stmt->execute();

                echo '<p class="message">Регистрация успешна!</p>';
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
    background-color: #337ab7;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #286090;
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