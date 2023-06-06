<?php
echo "Первое задание:";
echo "<br>";
$number = 0;
do {
    if ($number == 0) {
        echo "$number - это ноль<br>";
    } elseif ($number % 2 == 0) {
        echo "$number - чётное число<br>";
    } else {
        echo "$number - нечётное число<br>";
    }
    $number++;
} while ($number <= 10);
?>

<?php
echo "Второе задание:";
echo "<br>";
$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" =>["Рязань", "Касимов", "Ряжск"]];

foreach ($regions as $region => $cities) {
    echo $region . ":<br>";
    echo implode(", ", $cities) . "<br>";
}
?>

<?php
echo "Третье задание:";
echo "<br>";

$translate = [
    "а" => "a", "б" => "b", "в" => "v", "г" => "g",
    "д" => "d", "е" => "e", "ё" => "yo", "ж" => "zh",
    "з" => "z", "и" => "i", "й" => "y", "к" => "k",
    "л" => "l", "м" => "m", "н" => "n", "о" => "o",
    "п" => "p", "р" => "r", "с" => "s", "т" => "t",
    "у" => "u", "ф" => "f", "х" => "h", "ц" => "ts",
    "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "",
    "ы" => "y", "ь" => "'", "э" => "e", "ю" => "yu", "я" => "ya"];

function translation($str) {
    global $translate;
    $result = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $char = mb_substr($str, $i, 1);
        if (isset($translate[$char])) {
            $result .= $translate[$char];
        } else {
            $result .= $char;
        }
    }
    return $result;
}
echo translation('сделано третье задание');
echo "<br>";
?>

<?php
echo "Четвертое задание:";
echo "<br>";

$menu = [
    "Главная",
    "О нас",
    "Каталог" => [
        "Компьютеры",
        "Телефоны",
        "Аксессуары" => [
            "Наушники",
            "Чехлы",
            "Зарядные устройства"
        ]
    ]
];

function doMenu($menu) {
    echo "<ul>";
    foreach ($menu as $key => $value) {
        if (is_array($value)) {
            echo "<li>$key";
            doMenu($value);
            echo "</li>";
        } else {
            echo "<li>$value</li>";
        }
    }
    echo "</ul>";
}

doMenu($menu);
?>

<?php
echo "Шестое задание:";
echo "<br>";


$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин", "Коломна", "Красногорск"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Касимов", "Ряжск", "Кадом"]];

foreach ($regions as $region => $cities) {
    echo $region . ': ';
    foreach ($cities as $city) {
        if (mb_substr($city, 0, 1, 'UTF-8') == "К") {
            echo $city .  " ";
        }
    }
    echo '<br>';
}
?>