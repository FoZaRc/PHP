<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3.2</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён ЛБ3</h1>
    </header>
    <main>
        <h2>Запись текста в файл</h2>
    </main>
    <?php
        file_put_contents('test.txt', '12345');
        echo "Текст успешно записан в файл.";
    ?>
</body>
</html>