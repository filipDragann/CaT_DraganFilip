<?php
$pageTitle = "Inregistrare";
require_once __DIR__ . '/layout/header.php';
?>

<main>
    <h2>Inregistrare</h2>

    <?php if (isset($error)):  ?>
        <p class="error"><?= htmlspecialchars($errors) ?></p>
    <?php endif; ?>

    <form method="POST" action="/camping-app/register">
        <label for="name">Nume</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required minlenght="8">

        <label for="password_confirm">Confirma Parola</label>
        <input type="password" id="password_confirm" name="password_confirm" required minlenght="8">

        <button type="submit">Creeaza Cont</button>
    </form>

    <p>Ai deja cont? <a href="/camping-app/public/login">Autentifica-te</a></p>
</main>

<?php require_once __DIR__ .'/layout/footer.php';