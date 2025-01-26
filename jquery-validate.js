$("#contactForm").validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        message: {
            required: true,
        },
        privacyPolicy: {
            required: true,
        }
    },
    messages: {
        email: "Bitte eine gültige Email eingeben.",
        message: "Nachricht darf nicht leer sein.",
        privacyPolicy: "Bitte akzeptieren Sie die Datenschutzerklärung."
    },
    submitHandler: function(form) {
        form.submit(); //Formular senden
    }
});