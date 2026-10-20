<?php
require 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (!empty($title) && !empty($content)) {
        $stmt = $pdo->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
        $stmt->execute([$title, $content]);
        header('Location: index.php');
        exit;
    } else {
        $error = 'Please fill in all fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
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
    <h1>Create a New Post</h1>
    <a href="index.php">&larr; Back to Home</a>
    
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form action="create.php" method="POST">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content"><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
        </div>
        <button type="submit">Publish Post</button>
    </form>
</body>
</html>