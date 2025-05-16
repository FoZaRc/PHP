<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3.4</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён ЛБ3</h1>
    </header>
    <main>
        <h2>Копия файла. Пусть в корне вашего сайта лежит файл test.txt. Скопируйте его в файл copy.txt.</h2>
    </main>
    <?php
        $source = 'test.txt';
        $destination = 'copy.txt';

        if (file_exists($source)) {
            if (copy($source, $destination)) {
                echo "Файл успешно скопирован в $destination.";
            } else {
                echo "Ошибка при копировании файла.";
            }
        } else {
            echo "Файл $source не найден.";
        }
    ?>

</body>
</html>




