<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Gestion des Utilisateurs</title>
        <link rel="stylesheet" href="../Styles/ListeTravailleurs.css">
    </head>
    <body>
        <?php 
            $team = $_GET['team'];
            $role = $_GET['role'];
            $firstname = $_GET['firstname'];
            $lastname = $_GET['lastname'];
            require_once(__DIR__."/../../Controller/listeTravailleurController.php"); 

            if (isset($_GET['result'])) {
                $result = $_GET['result'];
                if ($result==0) {
                    echo('<p id="notification">Un problème a été rencontré</p>');
                } else {
                    echo('<p id="notification">heures ajoutés</p>');
                }
            }

        ?>
        <header>
            <a href="/../src/Vue/Pointeuse.php?role=<?= $role ?>&team=<?=$team?>&firstname=<?=$firstname?>&lastname=<?=$lastname?>">
                <img id="homeIcon" alt="homeIcon" src="/../src/Vue/media/home.png">
            </a>
        </header>
        <main>
            <div class="container">

                <?= $content ?>

            </div>
        </main>
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