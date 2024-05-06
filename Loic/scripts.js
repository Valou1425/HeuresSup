function registerTime(type) {
    const actionUrl = type === 'embauche' ? 'embauche.php' : 'debauche.php';
    fetch(actionUrl, {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
    })
    .catch(error => console.error('Error:', error));
}
