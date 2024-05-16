
<div class="container">
    <?php
    require_once(__DIR__."/../../Controller/ajoutHeureController.php");

    if (!empty($users)) {
        foreach ($users as $user) {
            echo "<div class='user-card'>
                    <p>" . htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']) . "</p>
                    <button class='button button-add' onclick='showModal(" . $user['id'] . ")'>Ajouter</button>
                    <div id='modal" . $user['id'] . "' class='modal hidden'>
                        <div class='modal-content'>
                            <span class='close' onclick='closeModal(" . $user['id'] . ")'>&times;</span>
                            <form method='POST' action='addHours.php'>
                                <input type='hidden' name='userId' value='" . $user['id'] . "'>
                                <input type='number' name='hours' placeholder='Heures supplémentaires' min='1' required>
                                <input type='date' name='date' required>
                                <button type='submit' class='button button-add'>Soumettre</button>
                            </form>
                        </div>
                    </div>
                    <button class='button button-delete'>Supprimer</button>
                    </div>";
        }
    } else {
        echo "<p>Pas d'utilisateurs à afficher.</p>";
    }

    //$content = ob_end_clean();

    ?>
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