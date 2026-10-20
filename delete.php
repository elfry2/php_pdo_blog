<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($id && filter_var($id, FILTER_VALIDATE_INT)) {
    $stmt = $pdo->prepare('DELETE FROM posts WHERE id = ?');
    $stmt->execute([$id]);
}

header('Location: index.php');
exit;
?>