<script>
    function validateForm() {
        var nom = document.getElementById("nom_f").value;
        var type = document.getElementById("type_f").value;
        var description = document.getElementById("description_f").value;
        var etat = document.getElementById("etat_f").value;
        var cout = document.getElementById("cout_f").value;
        var id_user = document.getElementById("id_user").value;
        var date_debut = document.getElementById("date_debut").value;
        var date_fin = document.getElementById("date_fin").value;

        // Réinitialiser les messages d'erreur
        document.getElementById("nom_error").innerHTML = "";
        document.getElementById("type_error").innerHTML = "";
        document.getElementById("description_error").innerHTML = "";
        document.getElementById("etat_error").innerHTML = "";
        document.getElementById("cout_error").innerHTML = "";
        document.getElementById("id_user_error").innerHTML = "";
        document.getElementById("date_debut_error").innerHTML = "";
        document.getElementById("date_fin_error").innerHTML = "";

        // Variable pour vérifier si toutes les validations passent
        var isValid = true;

// Validation pour le nom
if (!/^[a-zA-Z]+$/.test(nom)) {
    document.getElementById("nom_error").innerHTML = "Le nom doit contenir au moins une lettre et ne doit pas contenir de chiffres ni de caractères spéciaux.";
    isValid = false;
}


        // Validation pour le type
        if (type === "") {
            document.getElementById("type_error").innerHTML = "Veuillez sélectionner un type de formation.";
            isValid = false;
        }

        // Validation pour la description
        if (description.trim() === "") {
            document.getElementById("description_error").innerHTML = "Veuillez saisir une description.";
            isValid = false;
        }

        // Validation pour l'état
        if (etat.trim() === "") {
            document.getElementById("etat_error").innerHTML = "Veuillez saisir un état.";
            isValid = false;
        }

        // Validation pour le coût
        if (isNaN(parseFloat(cout)) || cout.trim() === "" || parseFloat(cout) >= 1000) {
            document.getElementById("cout_error").innerHTML = "Le coût doit être un nombre inférieur à 1000.";
            isValid = false;
        }

// Validation pour l'ID utilisateur
if (isNaN(parseFloat(id_user)) || id_user.trim() === "" || id_user.length > 4) {
    document.getElementById("id_user_error").innerHTML = "Veuillez saisir un ID utilisateur valide, composé de 4 chiffres au maximum.";
    isValid = false;
}


        // Validation pour la date de début
        var currentDate = new Date().toISOString().split('T')[0];
        if (date_debut < currentDate) {
            document.getElementById("date_debut_error").innerHTML = "La date de début doit être ultérieure à la date actuelle.";
            isValid = false;
        }

        // Validation pour la date de fin
        if (date_fin <= date_debut) {
            document.getElementById("date_fin_error").innerHTML = "La date de fin doit être postérieure à la date de début.";
            isValid = false;
        }

        // Retourne true si toutes les validations passent, sinon false
        return isValid;
    }
</script>
