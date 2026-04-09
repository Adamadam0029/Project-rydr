<?php require "includes/header.php" ?>
<main>
    <form action="/register-handler" method="post" class="account-form">
        <h2>Maak een account aan</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message">
                <?= $_SESSION['message'] ?>
            </div>
            <?php
            session_destroy();
             endif; ?>
        <label for="email">Uw e-mail</label>
        <input type="email" name="email" id="email" placeholder="johndoe@gmail.com" value="<?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '' ?>" required autofocus>
        <label for="wachtwoord">Uw wachtwoord</label>
        <input type="wachtwoord" name="wachtwoord" id="wachtwoord" placeholder="Uw wachtwoord" required>
        <label for="confirm-wachtwoord">Herhaal wachtwoord</label>
        <input type="wachtwoord" name="confirm-wachtwoord" id="confirm-wachtwoord" placeholder="Uw wachtwoord" required>
        <input type="submit" value="Maak account aan" class="button-primary">
    </form>
</main>

<?php require "includes/footer.php" ?>
