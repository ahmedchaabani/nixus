function validateForm() {
  var nomValid = validerNom();
  var typeValid = validerType();
  var descriptionValid = validerDescription();
  var etatValid = validerEtat();
  var coutValid = validerCout();
  var idUserValid = validerIDUser();
  var dateDebutValid = validerDateDebut();
  var dateFinValid = validerDateFin();

  // Retourne true si toutes les validations passent, sinon false
  return nomValid && typeValid && descriptionValid && etatValid && coutValid && idUserValid && dateDebutValid && dateFinValid;
}

function validerNom() {
  var nom = document.getElementById("nom_f").value;
  var msg = document.getElementById("nom_error");
  var pattern = /^[a-zA-Z]+$/;

  if (!pattern.test(nom)) {
      msg.innerHTML = "Le nom doit contenir au moins une lettre et ne doit pas contenir de chiffres ni de caractères spéciaux.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerType() {
  var type = document.getElementById("type_f").value;
  var msg = document.getElementById("type_error");

  if (type === "") {
      msg.innerHTML = "Veuillez sélectionner un type de formation.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerDescription() {
  var description = document.getElementById("description_f").value;
  var msg = document.getElementById("description_error");

  if (description.trim() === "") {
      msg.innerHTML = "Veuillez saisir une description.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerEtat() {
  var etat = document.getElementById("etat_f").value;
  var msg = document.getElementById("etat_error");

  if (etat.trim() === "") {
      msg.innerHTML = "Veuillez saisir un état.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerCout() {
  var cout = document.getElementById("cout_f").value;
  var msg = document.getElementById("cout_error");

  if (isNaN(parseFloat(cout)) || cout.trim() === "" || parseFloat(cout) >= 1000) {
      msg.innerHTML = "Le coût doit être un nombre inférieur à 1000.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerIDUser() {
  var id_user = document.getElementById("id_user").value;
  var msg = document.getElementById("id_user_error");

  if (isNaN(parseFloat(id_user)) || id_user.trim() === "" || id_user.length > 4) {
      msg.innerHTML = "Veuillez saisir un ID utilisateur valide, composé de 4 chiffres au maximum.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerDateDebut() {
  var date_debut = document.getElementById("date_debut").value;
  var msg = document.getElementById("date_debut_error");
  var currentDate = new Date().toISOString().split('T')[0];

  if (date_debut < currentDate) {
      msg.innerHTML = "La date de début doit être ultérieure à la date actuelle.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}

function validerDateFin() {
  var date_debut = document.getElementById("date_debut").value;
  var date_fin = document.getElementById("date_fin").value;
  var msg = document.getElementById("date_fin_error");

  if (date_fin <= date_debut) {
      msg.innerHTML = "La date de fin doit être postérieure à la date de début.";
      return false;
  } else {
      msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
      return true;
  }
}