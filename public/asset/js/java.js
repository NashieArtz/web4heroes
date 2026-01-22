document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const responseMessage = document.getElementById('responseMessage');

    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault(); // Empêche le rechargement de la page

        // Récupération des données du formulaire
        const formData = new FormData(loginForm);

        try {
            const response = await fetch(loginForm.action, {
                method: 'POST',
                body: formData
            });

            // On attend une réponse JSON du serveur
            const result = await response.json();

            if (response.ok) {
                // Succès
                showMessage('Connexion réussie ! Redirection...', 'success');
                // Redirection après 1.5 seconde
                setTimeout(() => {
                    window.location.href = 'dashboard';
                }, 1500);
            } else {
                // Erreur serveur (identifiants incorrects, etc.)
                showMessage(result.error || 'Identifiants invalides.', 'danger');
            }
        } catch (error) {
            // Erreur réseau
            showMessage('Erreur de connexion au serveur.', 'danger');
        }
    });

    // Fonction pour générer l'alerte Bootstrap
    function showMessage(text, type) {
        responseMessage.innerHTML = `
            <div class="alert alert-${type} border-0 bg-${type} bg-opacity-25 text-white small text-center rounded-pill mb-4">
                ${text}
            </div>
        `;
    }
});



document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        // Empêche l'envoi par défaut pour valider d'abord
        event.preventDefault();

        // Récupération des valeurs
        const nom = form.nom.value.trim();
        const prenom = form.prenom.value.trim();
        const email = form.email.value.trim();
        const password = form.password.value;
        const confirmPassword = form.confirm_password.value;
        const telephone = form.telephone.value.trim();

        // 1. Vérification des champs vides
        if (!nom || !prenom || !email || !password) {
            alert("Veuillez remplir tous les champs obligatoires (Nom, Prénom, Email, Mot de passe).");
            return;
        }

        // 2. Validation de l'E-mail (Regex simple)
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Veuillez entrer une adresse e-mail valide.");
            return;
        }

        // 3. Vérification de la longueur du mot de passe
        if (password.length < 8) {
            alert("Le mot de passe doit contenir au moins 8 caractères.");
            return;
        }

        // 4. Correspondance des mots de passe
        if (password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas.");
            return;
        }

        // 5. Validation du téléphone (optionnel - format français 10 chiffres)
        const telRegex = /^(06|07|01|02|03|04|05|09)\d{8}$/;
        if (telephone && !telRegex.test(telephone.replace(/\s/g, ''))) {
            alert("Le numéro de téléphone n'est pas valide.");
            return;
        }

        // Si tout est OK
        alert("Inscription réussie ! Bienvenue chez HEROS SOS.");
        form.submit(); // Envoie réellement le formulaire
    });
});


