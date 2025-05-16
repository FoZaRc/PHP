<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solve</title>
</head>
<body>
    <header>
        <h1>Гайворонский Семён - ЛБ Solve the equation </h1>
    </header>
    <?php  
        $equation = "x + 3 = 7";
        echo "Данное выражение: <br>";
        echo $equation . "<br>";
        $equation_no_space = str_replace(' ', '', $equation);
        $operators = ['+', '-', '*', '/'];
        [$left, $right] = explode('=', $equation_no_space);
        foreach ($operators as $op) {
            if (strpos($left,$op) !== false) {
                [$part1, $part2] = explode($op,$left);
                if ($part1 == "x") {
                    $x = match ($op) {
                        "+" => $right - $part2,
                        "-" => $right + $part2,
                        "/" => $right * $part2,
                        "*" => $right / $part2,
                    };
                } elseif ($part2 == "x") {
                    $x = match ($op) {
                        "+" => $right - $part1,
                        "-" => $right + $part1,
                        "/" => $right * $part1,
                        "*" => $right / $part1,
                    };
                }
                break;
            }
        }
        echo "Ответ:<br>";
        echo "X = $x";
    ?>
</body>
</html>