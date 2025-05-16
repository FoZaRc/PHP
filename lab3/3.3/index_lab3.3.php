<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3.3</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён ЛБ3</h1>
    </header>
    <main>
        <h2>Возвести число из файла test.txt и вывести его</h2>
    </main>
    <?php
$filename = 'test.txt';

// Проверка: существует ли файл
if (file_exists($filename)) {
    // Чтение содержимого файла
    $number = file_get_contents($filename);

    // Преобразуем в число
    $number = (int)$number;

    // Возводим в квадрат
    $square = $number * $number;

    // Запись обратно в файл
    file_put_contents($filename, $square);

    echo "Число $number возведено в квадрат. Новый результат: $square";
} else {
    echo "Файл $filename не найден.";
}
?>
</body>

</html>




