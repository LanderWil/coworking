<?php
// Retrieve the name and age from the URL parameters
$name = isset($_GET['name']) ? $_GET['name'] : false;
$age = isset($_GET['age']) ? $_GET['age'] : false;
?>

<!DOCTYPE html>
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
            <a href="./index.html"><img src="./images/logo.png" alt="logo" width="140px"></a>
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
        <section class="thank-you-section">
            <?php
            if ($name) {
                echo '<h1>Bedankt, ' . htmlentities($name) . '!</h1>';
                echo '<p>We waarderen het dat je ons hebt gecontacteerd. We zullen zo snel mogelijk reageren.</p>';
            } elseif ($age) {
                echo '<h1>Bedankt, ' . htmlentities($age) . '-jarige!</h1>';
                echo '<p>We waarderen het dat je ons hebt gecontacteerd. We zullen zo snel mogelijk reageren.</p>';
            } else {
                echo '<h1>Bedankt, vreemdeling!</h1>';
                echo '<p>We waarderen het dat je ons hebt gecontacteerd. We zullen zo snel mogelijk reageren.</p>';
            }
            ?>
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
