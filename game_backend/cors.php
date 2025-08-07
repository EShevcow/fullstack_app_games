<?php
// cors.php — подключать в каждый API-скрипт

// Разрешаем только фронтенд на React
header("Access-Control-Allow-Origin: http://localhost:3000");

// Разрешаем методы
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

// Разрешаем заголовки
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Если preflight-запрос (OPTIONS), просто отвечаем 200 и выходим
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
