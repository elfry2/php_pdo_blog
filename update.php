<?php
require 'db.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $stmt->execute([$title, $content, $id]);
        header('Location: view.php?id=' . $id);
        exit;
    } else {
        $error = 'Please fill in all fields.';
    }
} else {
    $stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
    $stmt->execute([$id]);
    $post = $stmt->fetch();

    if (!$post) {
        die("Post not found.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 600px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        textarea { height: 150px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Edit Post</h1>
    <a href="index.php">&larr; Back to Home</a>

    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content"><?= htmlspecialchars($post['content']) ?></textarea>
        </div>
        <button type="submit">Update Post</button>
    </form>
</body>
</html>