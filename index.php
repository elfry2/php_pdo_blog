<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Blog</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; line-height: 1.6; }
        .post { border-bottom: 1px solid #ccc; padding-bottom: 20px; margin-bottom: 20px; }
        .actions { margin-top: 10px; }
        a { text-decoration: none; color: #0066cc; margin-right: 10px; }
        a:hover { text-decoration: underline; }
        .btn { display: inline-block; padding: 10px 15px; background: #0066cc; color: #fff; border-radius: 4px; }
        .btn:hover { background: #004999; color: #fff; }
    </style>
</head>
<body>
    <h1>My Simple Blog</h1>
    <a href="create.php" class="btn">Create New Post</a>
    <hr style="margin: 20px 0;">

    <?php if (empty($posts)): ?>
        <p>No posts found.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <small>Published on: <?= $post['created_at'] ?></small>
                <p><?= nl2br(htmlspecialchars(substr($post['content'], 0, 150))) ?>...</p>
                <div class="actions">
                    <a href="view.php?id=<?= $post['id'] ?>">Read More</a>
                    <a href="update.php?id=<?= $post['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>