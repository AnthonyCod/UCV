document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');

    const nombresInput = document.getElementById('nombres');
    const apellidosInput = document.getElementById('apellidos');
    const dobInput = document.getElementById('dob');
    const telefonoInput = document.getElementById('telefono');
    const emailInput = document.getElementById('email');
    const usuarioInput = document.getElementById('usuario');
    const passwordInput = document.getElementById('password');
    const generoInput = document.getElementById('gender-title');

    // Set the max date for birthdate input
    const today = new Date().toISOString().split('T')[0];
    dobInput.max = today;

    const validateText = (text) => /^[a-zA-Z\s]+$/.test(text);
    const validatePhone = (phone) => /^\d{9}$/.test(phone);
    const validateEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    const showError = (input, message) => {
        const errorMessage = input.nextElementSibling.next;
        input.classList.add('input-error');
        input.classList.remove('input-success');
        errorMessage.textContent = message;
    };

    const showSuccess = (input) => {
        const errorMessage = input.nextElementSibling;
        input.classList.add('input-success');
        input.classList.remove('input-error');
        errorMessage.textContent = '';
    };

    const clearError = (input) => {
        const errorMessage = input.nextElementSibling;
        input.classList.remove('input-error');
        input.classList.remove('input-success');
        errorMessage.textContent = '';
    };

    const validateInput = (input, validationFn, message) => {
        if (input.value.trim() === "") {
            clearError(input);
            return true;
        }
        if (!validationFn(input.value)) {
            showError(input, message);
            return false;
        } else {
            showSuccess(input);
            return true;
        }
    };

    nombresInput.addEventListener('input', () => validateInput(nombresInput, validateText, 'Nombre inválido. Solo letras.'));
    apellidosInput.addEventListener('input', () => validateInput(apellidosInput, validateText, 'Apellido inválido. Solo letras.'));
    dobInput.addEventListener('input', () => validateInput(dobInput, (val) => true, ''));
    telefonoInput.addEventListener('input', () => validateInput(telefonoInput, validatePhone, 'Teléfono inválido.'));
    emailInput.addEventListener('input', () => validateInput(emailInput, validateEmail, 'Correo electrónico inválido.'));
    usuarioInput.addEventListener('input', () => validateInput(usuarioInput, (val) => true, ''));
    passwordInput.addEventListener('input', () => validateInput(passwordInput, (val) => val.length >= 8, 'La contraseña debe tener al menos 8 caracteres.'));

    registerForm.addEventListener('submit', (event) => {
        event.preventDefault();
        let isValid = true;

        isValid = validateInput(nombresInput, validateText, 'Nombre inválido. Solo letras.') && isValid;
        isValid = validateInput(apellidosInput, validateText, 'Apellido inválido. Solo letras.') && isValid;
        isValid = validateInput(dobInput, (val) => true, '') && isValid;
        isValid = validateInput(telefonoInput, validatePhone, 'Teléfono inválido.') && isValid;
        isValid = validateInput(emailInput, validateEmail, 'Correo electrónico inválido.') && isValid;
        isValid = validateInput(usuarioInput, (val) => true, '') && isValid;
        isValid = validateInput(passwordInput, (val) => val.length >= 8, 'La contraseña debe tener al menos 8 caracteres.') && isValid;

        if (isValid) {
            registerForm.submit();
        }
    });
});
