function validatePassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const passwordError = document.getElementById('password-error');
    const regex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,}$/;
<<<<<<< HEAD

=======
 
>>>>>>> Valentin
    if (!regex.test(password)) {
        passwordError.textContent = '⚠ Mot de passe incomplet';
        passwordError.style.display = 'block';
    } else {
        passwordError.style.display = 'none';
    }
<<<<<<< HEAD

=======
 
>>>>>>> Valentin
    if (password !== confirmPassword) {
        passwordError.textContent = '⚠ Le Mot de passe doit contenir un caractère spécial, un chiffre, et une majuscule.';
        passwordError.style.display = 'block';
    }
}
<<<<<<< HEAD

=======
 
>>>>>>> Valentin
document.getElementById('password-form').onsubmit = function (event) {
    validatePassword();
    const isVisible = document.getElementById('password-error').style.display === 'block';
    if (isVisible) {
        event.preventDefault();
    }
<<<<<<< HEAD
}

=======
}
>>>>>>> Valentin
