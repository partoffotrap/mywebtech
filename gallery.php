<?php
function ShowingImages(string $pathToImagesFolder, int $imageWidth = 200, int $imagesPerPage = 10){
    $fullPath = $pathToImagesFolder . 'full/';
    $smallPath = $pathToImagesFolder . 'small/';
    if (!file_exists($fullPath) || !file_exists($smallPath)) {
        echo 'Файл в папке отсутствует';
        return;
    }
    $fullImages = scandir($fullPath);
    if (!$fullImages) {
        echo 'Картинки отсутствуют';
        return;
    }
    $totalImages = count($fullImages) - 1;
    $currentPage = 1;
    if (!empty($_GET['page']) && is_numeric($_GET['page'])) {
        $currentPage = (int)$_GET['page'];
    }
    $startIndex = ($currentPage - 1) * $imagesPerPage + 2;
    $endIndex = $startIndex + $imagesPerPage;
    if ($endIndex > $totalImages) {
        $endIndex = $totalImages;
    }
    for ($i = $startIndex; $i <= $endIndex; $i++) {
        $fullImagePath = $fullPath . $fullImages[$i];
        $smallImagePath = $smallPath . $fullImages[$i];
        echo '<a target="_blank" href="' . $fullImagePath . '"><img src="' . $smallImagePath . '" width="' . $imageWidth . '"></a>';
    }
    echo '<br>';
    $totalPages = ceil($totalImages / $imagesPerPage);
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo '<p>' . $i . '</p> ';
        } else {
            echo '<a href="?page=' . $i . '">' . $i . '</a> ';
        }
    }
}

$logFilePath = 'logs/log.txt';
$maxLogFiles = 10;

if (file_exists($logFilePath) && count(file($logFilePath)) == $maxLogFiles) {
    $numOfLogs = count(array_slice(scandir('logs/'), 2)) - 1;
    $newLogFilePath = "logs/log$numOfLogs.txt";
    rename($logFilePath, $newLogFilePath);
}

$logMessage = date('H:i:s d-m-Y') . PHP_EOL;
file_put_contents($logFilePath, $logMessage, FILE_APPEND);
?>
