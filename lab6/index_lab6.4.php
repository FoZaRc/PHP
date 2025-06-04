<?php
$birthdayMessage = "";

// Сохраняем дату рождения, если отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["birthday"])) {
    $birthday = $_POST["birthday"];
    setcookie("birthday", $birthday, time() + (10 * 365 * 24 * 60 * 60)); // хранить 10 лет
    $_COOKIE["birthday"] = $birthday; // обновляем значение на текущей странице
}

// Проверяем, есть ли дата рождения
if (isset($_COOKIE["birthday"])) {
    $today = new DateTime();
    $birthDate = DateTime::createFromFormat('Y-m-d', $_COOKIE["birthday"]);

    // Дата следующего дня рождения
    $nextBirthday = DateTime::createFromFormat('Y-m-d', $today->format("Y") . '-' . $birthDate->format('m-d'));
    if ($nextBirthday < $today) {
        $nextBirthday->modify('+1 year');
    }

    $interval = $today->diff($nextBirthday);

    if ($interval->days === 0) {
        $birthdayMessage = "🎉 С Днём Рождения! 🎂";
    } else {
        $birthdayMessage = "До твоего дня рождения осталось: " . $interval->days . " дн.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поздравление с Днём Рождения</title>
</head>
<body>
    <h2>Добро пожаловать!</h2>

    <?php if (!isset($_COOKIE["birthday"])): ?>
        <form method="POST">
            <label>Введите вашу дату рождения:</label><br>
            <input type="date" name="birthday" required>
            <button type="submit">Сохранить</button>
        </form>
    <?php else: ?>
        <p><?= $birthdayMessage ?></p>
    <?php endif; ?>
</body>
</html>
