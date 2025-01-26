<?php

// Show all errors (for educational purposes)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// Constanten (connectie-instellingen databank)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cocontact');

date_default_timezone_set('Europe/Brussels');

// Verbinding maken met de databank
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Verbindingsfout: ' . $e->getMessage();
exit;
}

$name = isset($_POST['name']) ? (string)$_POST['name'] : '';
$message = isset($_POST['message']) ? (string)$_POST['message'] : '';
$msgName = '';
$msgMessage = '';

// form is sent: perform formchecking!
if (isset($_POST['btnSubmit'])) {

$allOk = true;

// name not empty
if (trim($name) === '') {
$msgName = 'Gelieve een naam in te voeren';
$allOk = false;
}

if (trim($message) === '') {
$msgMessage = 'Gelieve een boodschap in te voeren';
$allOk = false;
}

// end of form check. If $allOk still is true, then the form was sent in correctly
if ($allOk) {
// build & execute prepared statement
$stmt = $db->prepare('INSERT INTO messages (sender, message, added_on) VALUES (?, ?, ?)');
$stmt->execute(array($name, $message, (new DateTime())->format('Y-m-d H:i:s')));

// the query succeeded, redirect to this very same page
if ($db->lastInsertId() !== 0) {
header('Location: formchecking_thanks.php?name=' . urlencode($name));
exit();
} // the query failed
else {
echo 'Databankfout.';
exit;
}

}

}

?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactpagina</title>
    <link rel="stylesheet" href="stylesc.css">
    <link rel="stylesheet" href="https://unpkg.com/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div class="container">
        <a href="./index.html"><img src="../images/Klus_&_co.png" alt="logo" width="140px"></a>
        <nav>
            <ul>
                <li><a href="../">Home</a></li>
                <li><a href="../jobpagina">Jobpagina</a></li>
                <li><a href="./">Contact</a></li>
                <li><a href="../loginpagina">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <section class="contact-section">
        <h1>Contacteer ons</h1>
        <p>Heb je vragen of opmerkingen? Vul onderstaand formulier in en we nemen zo snel mogelijk contact met je op.</p>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>" class="input-text" required>
                <span class="message error"><?php echo $msgName; ?></span>
            </div>

            <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" placeholder="voorbeeld@email.com" required>
            </div>

            <div class="form-group">
                <label for="message">Boodschap</label>
                <textarea name="message" id="message" rows="5" placeholder="Schrijf hier je bericht..." required><?php echo htmlentities($message); ?></textarea>
                <span class="message error"><?php echo $msgMessage; ?></span>
            </div>

            <button type="submit" id="btnSubmit" name="btnSubmit" class="btn">Verstuur</button>
        </form>
    </section>
</main>

<footer>
    <div class="container">
        <ul>
            <li><a href="../">Home</a></li>
            <li><a href="../jobpagina">Jobpagina</a></li>
            <li><a href="./">Contact</a></li>
            <li><a href="../loginpagina">Login</a></li>
        </ul>
        <p>&copy; Elektronica-Ict Odisee Gent</p>
    </div>
</footer>
</body>
</html>
