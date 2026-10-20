<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch();

if (!$post) {
    die("Post not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><%= htmlspecialchars($post['title']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; max-width: 800px; }
        .meta { color: #666; margin-bottom: 20px; }
    </style>
</head>
<body>
    <a href="index.php">&larr; Back to Home</a>
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <div class="meta">Published on: <?= $post['created_at'] ?></div>
    <div class="content">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </div>
</body>
</html>