<?php
session_start();
include 'includes/db.php';

// Controleer of het formulier is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Zoek de gebruiker in de database
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password) {
        // Sla de gebruikersinformatie op in een sessie
        $_SESSION['user_id'] = $user['id'];
        header('Location: ../index.html');
        exit;
    } else {
        echo 'Onjuiste gebruikersnaam of wachtwoord.';
    }
}
?>
