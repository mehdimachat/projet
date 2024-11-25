<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
</head>
<body>
    <h1>Récupérer votre mot de passe</h1>
    <form action="process_forgot_password.php" method="post">
        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
<?php
if (isset($_SESSION['success'])) {
    echo "<p style='color: green;'>" . $_SESSION['success'] . "</p>";
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
}
?>