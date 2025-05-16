<?php
// Функция преобразует каждое второе слово в верхний регистр
function capitalizeEverySecondWord(&$words) {
    for ($i = 1; $i < count($words); $i += 2) {
        $words[$i] = mb_strtoupper($words[$i]);
    }
}

// Получаем текст из GET-параметра
$text = $_GET['text'] ?? '';
$result = '';

if (!empty($text)) {
    // Разбиваем строку по пробелам (без регулярных выражений)
    $words = explode(' ', $text);

    // Обрабатываем массив слов
    capitalizeEverySecondWord($words);

    // Собираем результат обратно в строку
    $result = implode(' ', $words);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lab3.1</title>
</head>
<body>
<header>
    <h1>Гайворонский Семён - ЛБ 3</h1>
</header>
<h2>Задание первое - каждое второе слово заглавными</h2>
<form method="get">
        <label for="text">Введите текст:</label><br>
        <input type="text" name="text" id="text" value="<?= htmlspecialchars($text) ?>"><br><br>
        <input type="submit" value="Преобразовать">
    </form>

    <?php if (!empty($result)): ?>
        <h3>Результат:</h3>
        <p><?= htmlspecialchars($result) ?></p>
    <?php endif; ?>

</body>
</html>
