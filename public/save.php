<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: index.php');
exit;
}


$baseDir = __DIR__ . '/../data/cvs';
if (!is_dir($baseDir)) mkdir($baseDir, 0755, true);


function sanitize($v){ return htmlspecialchars(trim($v ?? ''), ENT_QUOTES, 'UTF-8'); }


$data = [
'nome' => sanitize($_POST['nome'] ?? ''),
'nascimento' => sanitize($_POST['nascimento'] ?? ''),
'idade' => sanitize($_POST['idade'] ?? ''),
'telefone' => sanitize($_POST['telefone'] ?? ''),
'email' => sanitize($_POST['email'] ?? ''),
'resumo' => sanitize($_POST['resumo'] ?? ''),
'experiencias' => $_POST['experiencias'] ?? [],
'referencias' => $_POST['referencias'] ?? []
];


$file = $baseDir . '/cv_' . time() . '.json';
file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
header('Location: preview.php?file=' . basename($file));
exit;