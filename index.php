<?php
$a = -10;
$b = 17;

echo "Первое задание:";
echo "</br>";
if ($a > 0 && $b > 0) {
    echo "разность чисел: " . ($a - $b) ;
} elseif ($a < 0 && $b < 0) {
    echo "произведение чисел: " . ($a * $b);
} else {
    echo "сумма чисел: " . ($a + $b);
}
echo "</br>";
?>

<?php
$a = 3;

echo "Второе задание:";
echo" </br>";
switch ($a) {
    case 0:
        echo "0<br>";
    case 1:
        echo "1<br>";
    case 2:
        echo "2<br>";
    case 3:
        echo "3<br>";
    case 4:
        echo "4<br>";
    case 5:
        echo "5<br>";
    case 6:
        echo "6<br>";
    case 7:
        echo "7<br>";
    case 8:
        echo "8<br>";
    case 9:
        echo "9<br>";
    case 10:
        echo "10<br>";
    case 11:
        echo "11<br>";
    case 12:
        echo "12<br>";
    case 13:
        echo "13<br>";
    case 14:
        echo "14<br>";
    case 15:
        echo "15<br>";
        break;
    default:
        echo "$a не в промежутке [0..15]";
}
?>

<?php
$a = -10;
$b = 0;

echo "Третье задание:";
echo "</br>";

function plus($a, $b) {
    return $a + $b;
}

function minus($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b == 0) {
        return "деление на ноль невозможно";
    } else {
        return $a / $b;
    }
}

echo "сумма: " . plus($a, $b)  . "," . " разность: " . minus($a, $b)  . "," . " умноженное: " . multiply($a, $b)  . "," . " деленное: " . divide($a, $b);
echo "</br>";
?>

<?php
$arg1 = -10;
$arg2 = 0;

echo "Четвертое задание:";
echo "</br>";

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "+":
            return plus($arg1, $arg2);
        case "-":
            return minus($arg1, $arg2);
        case "*":
            return multiply($arg1, $arg2);
        case "/":
            if ($arg2 == 0) {
                return "деление на ноль невозможно";
            } else {
                return $arg1 / $arg2;
            }
    }
}

echo "сумма: " . mathOperation($arg1, $arg2, '+')  . "," . " разность: " . mathOperation($arg1, $arg2, '-')  . "," . " умноженное: " . mathOperation($arg1, $arg2, '*')  . "," . " деленное: " . mathOperation($arg1, $arg2, '/');
echo "</br>";
?>

<?php
echo "Пятое задание:";
echo "</br>";
echo "Первый способ:";
echo "</br>";
$currentYear = date('Y');
echo "</br>";
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title> tittle </title>
    </head>
    <body>
    <p> Текущий год: <?= $currentYear ?> </p>
    </body>
    </html>

<?php
echo "Второй способ:";
echo "</br>";
$currentYear = date('Y');
require ('site.php');
echo "</br>";
?>

<?php
echo "Третий способ:";
echo "</br>";
$currentYear = date('Y');
$content = file_get_contents('site.html');
$content = str_replace('{{ currentYear }}', $currentYear, $content);
echo $content;
echo "</br>";
?>

<?php
$val = 2;
$pow = -2;

echo "Шестое задание:";
echo "</br>";
function power($val, $pow) {
    if ($val != 0 and $pow == 0) {
        return 1;
    }
    elseif ($val == 0) {
        return 0;
    }
    elseif ($pow > 0) {
        return $val * power($val, $pow - 1);
    }
    elseif ($pow < 0) {
        return  1 / $val * power($val, $pow + 1);
    }
}
echo power($val, $pow);
?>