function validateField(input, validationFunction, errorMessage) {
    const errorSpan = document.getElementById(input.id + '-error');
    input.addEventListener('keyup', () => {
        if (validationFunction(input.value)) {
            errorSpan.textContent = 'Correct';
            errorSpan.style.color = 'green';
        } else {
            errorSpan.textContent = errorMessage;
            errorSpan.style.color = 'red';
        }
    });
}

// Fonctions de validation spécifiques
function validateNomPrenom(value) {
    return value.trim().length >= 3;
}

function validateCIN(value) {
    return /^[0-9]{8}$/.test(value);
}

function validateEmail(value) {
    return /^[a-zA-Z0-9._%+-]+@gmail\.com$/.test(value) && value.length >= 14;
}

function validateMotDePasse(value) {
    return value.length >= 6;
}

function validateTelephone(value) {
    return /^[0-9]{8}$/.test(value);
}

function validateAdresse(value) {
    return value.trim().length >= 4;
}

// Ajout des validations pour chaque champ
document.addEventListener('DOMContentLoaded', () => {
    validateField(document.getElementById('nom'), validateNomPrenom, 'Le nom doit contenir au moins 3 lettres.');
    validateField(document.getElementById('prenom'), validateNomPrenom, 'Le prénom doit contenir au moins 3 lettres.');
    validateField(document.getElementById('cin'), validateCIN, 'Le CIN doit contenir exactement 8 chiffres.');
    validateField(document.getElementById('email'), validateEmail, "L'email doit contenir au moins 14 caractères et se terminer par @gmail.com.");
    validateField(document.getElementById('mot_de_passe'), validateMotDePasse, 'Le mot de passe doit contenir au moins 6 caractères.');
    validateField(document.getElementById('telephone'), validateTelephone, 'Le numéro de téléphone doit contenir exactement 8 chiffres.');
    validateField(document.getElementById('adresse'), validateAdresse, "L'adresse doit contenir au moins 4 caractères.");
});