function loadData() {
    // Requête AJAX pour récupérer les données du serveur
    $.ajax({
        url: 'donnees.php',
        success: function(data) {
            // Mise à jour de la page web avec les nouvelles données
            $('#contenu').html(data);
        }
    });
}

// Appel initial de la fonction loadData()
loadData();

// Mise à jour de la page web toutes les 5 secondes
setInterval(loadData, 50);