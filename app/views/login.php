<?php
$page_title = "Auth";
require_once __DIR__ . '/layout/header.php';
?>

<main>
    <h2>Autentificare</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action ="/camping-app/public/login">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="text" id="password" name="password"required

        <button type="submit">Intra in cont</button>
    </form>

    <p>Nu ai cont? <a href="/camping-app/public/register">Inregistreaza te</a></p>
</main>

<?php require_once __DIR__ .'/layout/footer.php'; ?>