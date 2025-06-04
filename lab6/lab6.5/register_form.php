<?php
session_start();
$email = $_SESSION["email"] ?? "";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="POST" action="submit_registration.php">
        <label>Имя:</label><br>
        <input type="text" name="first_name" required><br><br>

        <label>Фамилия:</label><br>
        <input type="text" name="last_name" required><br><br>

        <label>Пароль:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required><br><br>

        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>
