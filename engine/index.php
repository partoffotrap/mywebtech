<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

$page = 'index';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = ['menu' => [
    ['title' => 'Главная', 'url' => '/engine/'],
    ['title' => 'О нас', 'url' => '/engine/?page=about'],
    ['title' => 'Каталог', 'url' => '/engine/?page=catalog'],
    'Мы также продаем:' => [
        ['title' => 'Компьютеры', 'url' => '/engine/?page=catalog1'],
        ['title' => 'Телефоны', 'url' => '/engine/?page=catalog2'],
        ['title' => 'Аксессуары', 'url' => '/engine/?page=catalog3'],],
    ]];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        $params['test'] = 'Test';
        break;
    case 'catalog':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog();
        break;
    case 'about':
        $params['title'] = 'О нас';
        $params['phone'] = '+7 495 123 23 23';
        break;
    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
    default:
        echo "404";
        die();
}

function getCatalog()
{
    return [
        [
            'name' => 'Яблоко',
            'price' => 24,
            'image' => 'apple.png'
        ],
        [
            'name' => 'Банан',
            'price' => 1,
            'image' => 'banana.png'
        ],
        [
            'name' => 'Апельсин',
            'price' => 12,
            'image' => 'orange.png'
        ],
    ];
}

function renderTemplate($page, $params = [])
{

//    foreach ($params as $key => $value) {
//            $$key = $value;
//        }
    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

//renderTemplate('index', $params);

echo renderTemplate(LAYOUTS_DIR . 'main', [
    'title' => $params['title'],
    'menu' => renderTemplate('menu', $params),
    'content' => renderTemplate($page, $params),
]);
