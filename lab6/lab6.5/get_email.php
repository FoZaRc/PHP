<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])) {
    $_SESSION["email"] = $_POST["email"];
    header("Location: register_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Введите Email</title>
</head>
<body>
    <h2>Введите ваш email</h2>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Продолжить</button>
    </form>
</body>
</html>
