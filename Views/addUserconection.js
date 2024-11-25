function validateField(input, validationFunction, errorMessage) {
    const errorSpan = document.getElementById(input.id + '-error');
    input.addEventListener('keyup', () => {
        if (validationFunction(input.value)) {
            errorSpan.textContent = 'Correct';
            errorSpan.className = 'success-message';
        } else {
            errorSpan.textContent = errorMessage;
            errorSpan.className = 'error-message';
        }
    });
}

// Fonction de validation pour l'email
function validateEmail(value) {
    // Vérifie que l'email est valide et qu'il se termine par `@gmail.com`
    return /^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(value);
}

// Fonction de validation pour le mot de passe
function validatePassword(value) {
    // Vérifie que le mot de passe contient au moins 6 caractères
    return value.length >= 6;
}

// Ajout des validations
document.addEventListener('DOMContentLoaded', () => {
    validateField(
        document.getElementById('email'),
        validateEmail,
        "L'email doit être valide et se terminer par @gmail.com."
    );
    validateField(
        document.getElementById('mot_de_passe'),
        validatePassword,
        'Le mot de passe doit contenir au moins 6 caractères.'
    );
});