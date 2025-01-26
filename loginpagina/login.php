<?php
// server.php toevoegen voor databaseverbinding
include('server.php');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://unpkg.com/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Header (Navigatiebalk) -->
<header>
    <div class="container">
        <a href="../index.html"><img src="../images/Klus_&_co.png" alt="logo" width="140px"></a>
        <nav>
            <ul>
                <li><a href="../">Home</a></li>
                <li><a href="../jobpagina">Jobpagina</a></li>
                <li><a href="../contactpagina">Contact</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main content -->
<main>
    <div class="container">
        <h1>Inloggen</h1>
        <p>Vul je inloggegevens in om verder te gaan:</p>

        <form action="login_verwerk.php" method="POST">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>

            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" placeholder="Wachtwoord" required>

            <button type="submit">Inloggen</button>
        </form>

        <p>Nog geen account?
            <a href="../registreerpagina/registreer.php">Registreer hier</a>
        </p>
    </div>
</main>


</body>
</html>
