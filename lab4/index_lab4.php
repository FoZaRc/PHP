<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab4</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён ЛБ4</h1>
    </header>
    <main>
        <section>
        <h2>На preg_replace_callback Дана строка с целыми числами. С помощью регулярки преобразуйте строку так, чтобы вместо этих чисел стояли их квадраты.</h2>
        <?php
            $str = "У меня 3 яблока, 4 груши и -2 апельсина.";

            // Заменим все целые числа на их квадраты
            $result = preg_replace_callback('/-?\d+/', function ($matches) {
                $number = (int)$matches[0];
                return $number * $number;
            }, $str);

            echo $result;
        ?>
        </section>
        <section>
            <h2>Задачи на preg_replace. С помощью preg_replace замените в строке домены вида http://site.ru, http://site.com на site.ru.</h2>
            <?php
                $str = "Посети http://site.ru и http://example.com прямо сейчас!";

                // Заменяем http://домен на просто домен
                $result = preg_replace('/http:\/\/([\w\-]+\.(ru|com))/', '$1', $str);

                echo $result;
            ?>
        </section>
        <section>
            <h2>
                Дана строка 'aaa@bbb eee7@kkk'. Напишите регулярку, которая найдет строки по шаблону: любое количество букв и цифр, символ @, любое количество букв и цифр и поменяет местами то, что стоит до @ на то, что стоит после нее. 
            </h2>
            <?php
                $str = 'aaa@bbb eee7@kkk';

                $result = preg_replace('/(\w+)@(\w+)/', '$2@$1', $str);

                echo $result;
            ?>
        </section>
        <section>
            <h2>
                На экранировку Дана строка '*+ *q+ *qq+ *qqq+ *qqq qqq+'. Напишите регулярку, которая найдет строки *+, *q+, *qq+, *qqq+, не захватив остальные.
            </h2>
            <?php
                $str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';

                // Найдём *q+, *qq+, *qqq+ (с 0–3 q) и строго + в конце
                preg_match_all('/\*q{0,3}\+/', $str, $matches);

                print_r($matches[0]);
            ?>
        </section>
        <section>
            <h2>
                На [], '^' - не, [a-zA-Z], кириллицу Дана строка 'aba aea aca aza axa a-a a#a'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы 'a', а между ними - не 'e' и не 'x'.
            </h2>
            <?php
                $str = 'aba aea aca aza axa a-a a#a';

                preg_match_all('/\ba[^ex]a\b/', $str, $matches);

                print_r($matches[0]);
            ?>
        </section>
    </main>
</body>
</html>




