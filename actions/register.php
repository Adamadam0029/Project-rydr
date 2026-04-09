<?php require "includes/header.php" ?>
<?php require "database/connection.php" ?>

<?php 
ini_set('display_errors' ,1);
error_reporting(E_ALL);



$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$wachtwoord = $_POST["wachtwoord"];
$confirm_wachtwoord = $_POST["confirm-wachtwoord"];

if ($wachtwoord === $confirm_wachtwoord) {
    $check_account = $conn->prepare("SELECT * FROM account WHERE email = :email");
    $check_account->bindParam(":email", $email);
    $check_account->execute();

    if ($check_account->rowCount() === 0) {
        //Extra hoge cost om nog beter te beveiligen
        $options = ['cost' => 14];
        $encrypted_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT, $options);

        $create_account = $conn->prepare("INSERT INTO account (email, wachtwoord) VALUES (:email, :wachtwoord)");
        $create_account->bindParam(":email", $email);
        $create_account->bindParam(":wachtwoord", $encrypted_wachtwoord);
        $create_account->execute();

        $_SESSION["success"] = "Registratie is gelukt, log nu in:";
        header("Location: /login-form");
        exit();
    } else {
        $_SESSION["message"] = "Dit e-mailadres is al in gebruik.";
        $_SESSION["email"] = htmlspecialchars($email);
        header("Location: /register-form");
        exit();
    }
} else {
    $_SESSION["message"] = "Wachtwoorden komen niet overeen.";
    $_SESSION["email"] = htmlspecialchars($email);
    header("Location: register-form.php");
    exit();
}

?>