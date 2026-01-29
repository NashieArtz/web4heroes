let delay = 2000;


    document.addEventListener("DOMContentLoaded", () => {

    // Toutes les cards "hero"
    const heroCards = document.querySelectorAll(".card-hero");

    heroCards.forEach(card => {
    // Style de base
    card.style.transition = "all 0.3s ease";
    card.style.cursor = "pointer";

    card.addEventListener("mouseenter", () => {
    card.style.transform = "translateY(-8px) scale(1.03)";
    card.style.boxShadow = "0 20px 40px rgba(0,0,0,0.15)";
    card.style.backgroundColor = "#0D2847";
});

    card.addEventListener("mouseleave", () => {
    card.style.transform = "translateY(0) scale(1)";
    card.style.boxShadow = "0 8px 20px rgba(0,0,0,0.08)";
});
});

    // Cards du carousel (incidents)
    const incidentCards = document.querySelectorAll(".carousel-item .rounded");

    incidentCards.forEach(card => {
    card.style.transition = "all 0.3s ease";
    card.style.cursor = "pointer";

    card.addEventListener("mouseenter", () => {
    card.style.transform = "scale(1.05)";
    card.style.boxShadow = "0 15px 30px rgba(0,0,0,0.4)";
});

    card.addEventListener("mouseleave", () => {
    card.style.transform = "scale(1)";
    card.style.boxShadow = "none";
});
});

});
/*
code js pour réinitialisation de mot de passe
 */
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("forgot_form");
    const emailInput = document.getElementById("email");
    const submitButton = document.getElementById("submit_forgot");

    // Création du message d’erreur
    const errorMsg = document.createElement("p");
    errorMsg.style.color = "red";
    errorMsg.style.fontSize = "0.9em";
    errorMsg.style.marginTop = "5px";
    errorMsg.style.display = "none";
    emailInput.insertAdjacentElement("afterend", errorMsg);

    // Vérification simple de l'email
    const isValidEmail = (email) => {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    };

    form.addEventListener("submit", (e) => {
        const email = emailInput.value.trim();

        if (!isValidEmail(email)) {
            e.preventDefault(); // Empêche l'envoi du formulaire
            errorMsg.textContent = "Veuillez entrer une adresse email valide.";
            errorMsg.style.display = "block";
        } else {
            errorMsg.style.display = "none"; // Tout va bien, on laisse envoyer
        }
    });
});
