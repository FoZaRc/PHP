<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён - ЛБ 2</h1>
    </header>
    <main>
        <section>
            <h2>Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Подсчитайте сколько раз встречается каждая из букв.</h2>
            <?php 
                $new_array = ["a", "b", "c", "b", "a"];
                $result = array_count_values($new_array);
                foreach ($result as $key => $value) {
                    echo "Колличество $key в массиве - $value <br>";
                };
            ?>
        </section>
        <section>
            <h2>Даны два массива: ['a', 'b', 'c'] и [1, 2, 3]. Создайте с их помощью массив 'a'=>1, 'b'=>2, 'c'=>3'.</h2>
            <?php
                $key = ['a', 'b', 'c'];
                $value = [1, 2, 3];
                $result = array_combine($key,$value);
                print_r($result)
            ?>
        </section>
        <section>
            <h2>Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice сделайте из него массив [1, 2, 3, 'a', 'b', 'c', 4, 5].</h2>
            <?php
                $arr = [1, 2, 3, 4, 5];
                array_splice($arr,3,0,["a","b","c"]);
                print_r($arr)
            ?>
        </section>
        <section>
            <h2>Сделайте 3 ссылки. Пусть первая передает число 1, вторая - число 2, третья - число 3. Сделайте так, чтобы по нажатию на ссылку на экран выводилось ее число.</h2>
            <a href="?num=1">Число 1</a><br>
            <a href="?num=2">Число 2</a><br>
            <a href="?num=3">Число 3</a><br>

            <?php
                if (isset($_GET["num"])) {
                    $num = (int)$_GET["num"];
                    echo "<p>Вы нажали на число: $num</p>";
                }
            ?>
        </section>
        <section>
            <h2>Сделайте функцию, которая принимает параметром число от 1 до 7, а возвращает день недели на русском языке.</h2>
            <?php
                function DayWeek($num_day) {
                    $days = [
                        1 => 'Понедельник',
                        2 => 'Вторник',
                        3 => 'Среда',
                        4 => 'Четверг',
                        5 => 'Пятница',
                        6 => 'Суббота',
                        7 => 'Воскресенье'
                    ];

                    if ($num_day > 1 && $num_day <= 7) {
                        return $days[$num_day];
                    } else {
                        return "Неверный номер дня";
                    }
                }

            $day = DayWeek(4);
            echo "День недели: " . $day
            ?>
        </section>
    </main>
</body>
</html>