<?php
// Обработка POST-запроса
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['expression'])) {
    $expr = str_replace(' ', '', $_POST['expression']); // удаляем пробелы

    // Проверка на допустимые символы (вручную)
    $allowed = str_split("0123456789+-*/().");
    foreach (str_split($expr) as $char) {
        if (!in_array($char, $allowed)) {
            echo "Недопустимый символ";
            exit;
        }
    }

    // Преобразование выражения в массив токенов
    function tokenize($expr) {
        $tokens = [];
        $number = '';
        foreach (str_split($expr) as $char) {
            if (ctype_digit($char) || $char === '.') {
                $number .= $char;
            } else {
                if ($number !== '') {
                    $tokens[] = $number;
                    $number = '';
                }
                $tokens[] = $char;
            }
        }
        if ($number !== '') {
            $tokens[] = $number;
        }
        return $tokens;
    }

    // Рекурсивный парсер-вычислитель
    function evaluate($tokens) {
        $stack = [];

        while (count($tokens) > 0) {
            $token = array_shift($tokens);

            if ($token === '(') {
                $stack[] = evaluate($tokens); // рекурсивно обрабатываем скобки
            } elseif ($token === ')') {
                break;
            } elseif (in_array($token, ['+', '-', '*', '/'])) {
                $stack[] = $token;
            } else {
                $stack[] = (float)$token;
            }

            // Упрощение, если в стеке есть число, операция, число
            while (count($stack) >= 3 &&
                   is_float($stack[count($stack)-1]) &&
                   in_array($stack[count($stack)-2], ['+', '-', '*', '/']) &&
                   is_float($stack[count($stack)-3])) {

                $b = array_pop($stack);
                $op = array_pop($stack);
                $a = array_pop($stack);

                switch ($op) {
                    case '+': $stack[] = $a + $b; break;
                    case '-': $stack[] = $a - $b; break;
                    case '*': $stack[] = $a * $b; break;
                    case '/': $stack[] = $b == 0 ? 0 : $a / $b; break;
                }
            }
        }

        return $stack[0];
    }

    $tokens = tokenize($expr);
    $result = evaluate($tokens);
    echo $result;
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Калькулятор</title>
    <link rel="stylesheet" href="./style.css">
    <script>
        function append(char) {
            document.getElementById("expression").value += char;
        }

        function calculate() {
            const expression = document.getElementById("expression").value;
            fetch("", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "expression=" + encodeURIComponent(expression),
            })
            .then((res) => res.text())
            .then((result) => {
                document.getElementById("expression").value = result;
            });
        }

        function clearDisplay() {
            document.getElementById("expression").value = "";
        }
    </script>
</head>
<body>
    <div class="wraper">
        <input type="text" id="expression" readonly class="input"><br>
        <button onclick="append('1')">1</button>
        <button onclick="append('2')">2</button>
        <button onclick="append('3')">3</button>
        <button onclick="append('+')">+</button><br>
        <button onclick="append('4')">4</button>
        <button onclick="append('5')">5</button>
        <button onclick="append('6')">6</button>
        <button onclick="append('-')">-</button><br>
        <button onclick="append('7')">7</button>
        <button onclick="append('8')">8</button>
        <button onclick="append('9')">9</button>
        <button onclick="append('*')">*</button><br>
        <button onclick="append('0')">0</button>
        <button onclick="append('(')">(</button>
        <button onclick="append(')')">)</button>
        <button onclick="append('/')">/</button><br>
        <button onclick="clearDisplay()">C</button>
        <button onclick="calculate()">=</button>
    </div>
</body>
</html>
