<?php
function getCurrentTime() {
    $hour = date("G");
    $minute = date("i");

    if ($hour == 1 || $hour == 21) {
        $hourStr = $hour . " час";
    } elseif (($hour >= 2 && $hour <= 4) || ($hour >= 22 && $hour <= 24)) {
        $hourStr = $hour . " часа";
    } else {
        $hourStr = $hour . " часов";
    }

    if ($minute == 1 || $minute == 21 || $minute == 31 || $minute == 41 || $minute == 51) {
        $minuteStr = $minute . " минута";
    } elseif ($minute >= 2 && $minute <= 4 || $minute >= 22 && $minute <= 24 || $minute >= 32 && $minute <= 34 || $minute >= 42 && $minute <= 44 || $minute >= 52 && $minute <= 54) {
        $minuteStr = $minute . " минуты";
    } else {
        $minuteStr = $minute . " минут";
    }

    return $hourStr . " " . $minuteStr;
}

$title = "Рандомный нейм";
$header = "Первая лаба по пхп";
$currentYear = "2023";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?= $title ?> </title>
</head>
<body>
<header>
    <h1> <?= $header ?> </h1>
</header>
<main>
    <p> Текущее время: <?= getCurrentTime(); ?></p>
    <p> Текущий год: <?= $currentYear ?> </p>
</main>
</body>
</html>