<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Обрабатывать preflight-запросы (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

header('Content-Type: application/json');

require 'db.php';
require 'auth.php';

checkAuth();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$uri = explode('/', trim(str_replace($script_name, '', $path), '/'));

if (count($uri) === 0 || $uri[0] === '') {
    http_response_code(404);
    echo json_encode(['error' => 'Not found']);
    exit;
}

if ($uri[1] === 'games' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT id, slug, name, poster, rating FROM games");
    echo json_encode($stmt->fetchAll());
    exit;
}

if ($uri[1] === 'game' && isset($uri[2]) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->prepare("SELECT * FROM games WHERE slug = ?");
    $stmt->execute([$uri[2]]);
    $game = $stmt->fetch();
    if (!$game) {
        http_response_code(404);
        echo json_encode(['error' => 'Game not found']);
        exit;
    }
    echo json_encode($game);
    exit;
}

http_response_code(404);
echo json_encode(['error' => 'Not found']);
?>
