<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Embauche et Débauche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'EmploymentController.php';
    $controller = new EmploymentController();
    $message = '';
    $alertClass = '';
    
    if (isset($_POST['embauche'])) {
        list($message, $type) = $controller->embaucher();
        $alertClass = $type == "negative" ? 'alert-negative' : 'alert-positive';
    }
    if (isset($_POST['debauche'])) {
        list($message, $type) = $controller->debaucher();
        $alertClass = $type == "negative" ? 'alert-negative' : 'alert-positive';
    }
    if ($message !== '') {
        echo "<div class=\"alert $alertClass\">$message</div>";
    }
    ?>
    <div class="container">
        <div class="button-container">
            <h2>Cliquer sur l'un des boutons</h2>
            <form action="" method="post">
                <button type="submit" name="embauche" class="button button-embauche">Embauche</button>
                <button type="submit" name="debauche" class="button button-debauche">Débauche</button>
            </form>
        </div>
    </div>
</body>
</html>
