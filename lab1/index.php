<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Основные элементы и операторы</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён ЛБ 2.1</h1>
    </header>
    <main>
        <section>
            <h2>Задание первое - найти значение гипотенузы</h2>
            <p>Дано: a = 27, b = 12</p>
            <?php
                $a = 27;
                $b = 12;

                $c = sqrt(pow($a, 2) + pow($b, 2));
                $c_rounded = round($c, 2);

            ?>
            <p>Ответ: <?= $c_rounded; ?></p>
        </section>
        <section>
            <h2>Задание второе - Интерполяция</h2>
            <p>Дано: $give = 'Дают';$take = 'бери'; $beat = 'бьют'; $run = 'беги'</p>
            <?php
                $give = 'Дают';
                $take = 'бери';
                $beat = 'бьют';
                $run = 'беги';
            ?>
            <p>Ответ: <?= $proverb = "{$give} {$take} {$beat} {$run}" ?></p>
        </section>
        <section>
            <h2>Задание третье - Операторы присваивания</h2>
            <p> Дано: $a = 148; $b = 76; $c = ' голубя'</p>
            <?php 
                $a = 148;
                $b = 76;
                $c = " голубя"
                
            ?>
            <p>Ответ: <?= $itog = ($a - $b ) . $c ?></p>
        </section>
        <section>
            <h2>Задание четвертое - Тернарный оператор</h2>
            <p>Дано: $a = 36; $b = '4'</p>
            <?php 
                $a = 36;
                $b = 4;
                $message = ($a % $b) > 0 ? "Тип результата деления " . gettype($a/$b) . " остаток " . ($a % $b) : "$a / $b = " . $a / $b;
            ?>
            <p>Ответ: <?= $message ?></p>
        </section>
        <section>
            <h2>Задание пятое - Циклы</h2>
            <p>Посчитать сумму первых 20 четных членов натурального ряда</p>
            <?php 
                $sum = 0;
                $count = 0;
                $number = 2;

                do {
                    $sum += $number;
                    $count += 1;
                    $number += 2;
                } while ($count < 20);
            ?>
            <p>Ответ: <?= $sum; ?></p>
        </section>
    </main>
</body>
</html>