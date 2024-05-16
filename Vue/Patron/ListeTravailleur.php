<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Gestion des Utilisateurs</title>
        <link rel="stylesheet" href="../Styles/ListeTravailleurs.css">
    </head>
    <body>
        <div class="container">

            <?php 
            $team = $_GET['team'];
            require_once(__DIR__."/../../Controller/ajoutHeureController.php"); 
            ?>

            <?= $content ?>

        </div>
        <script>
            function showModal(userId) {
                var modal = document.getElementById('modal' + userId);
                modal.style.display = 'block';
            }

            function closeModal(userId) {
                var modal = document.getElementById('modal' + userId);
                modal.style.display = 'none';
            }
        </script>
    </body>
</html>