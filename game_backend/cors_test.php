<?php
// Указываем домен фронтенда (ВАЖНО: не *)
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Обработка preflight-запросов
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Тестовый JSON-ответ
echo json_encode(["status" => "ok"]);
