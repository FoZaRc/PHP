<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3.5</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён ЛБ3</h1>
    </header>
    <main>
        <h2>Проверка существования файла. Проверьте, лежит ли в корне вашего сайта файл test.txt. Если да - удалите его, если нет - создайте.</h2>
    </main>
    <?php
        $filename = 'test.txt';

        if (file_exists($filename)) {
            // Удаление файла
            if (unlink($filename)) {
                echo "Файл $filename удалён.";
            } else {
                echo "Не удалось удалить файл $filename.";
            }
        } else {
            // Создание файла
            if (file_put_contents($filename, '') !== false) {
                echo "Файл $filename создан.";
            } else {
                echo "Не удалось создать файл $filename.";
            }
        }
    ?>


</body>
</html>




