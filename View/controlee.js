function validateForm() {
  var nomValid = validerNom();
  var dureeValid = validerDuree();
  var descriptionValid = validerDescription();
  var formateurValid = validerFormateur();
  var niveauValid = validerNiveau();
  var idUserValid = validerIDUser();
  var idFormationValid = validerIDFormation();

  // Retourne true si toutes les validations passent, sinon false
  return nomValid && dureeValid && descriptionValid && formateurValid && niveauValid && idUserValid && idFormationValid;
}

function validerNom() {
  var nom = document.getElementById("nom_a").value;
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

function validerDuree() {
  var duree = document.getElementById("dure_a").value;
  var msg = document.getElementById("dure_error");

  if (duree.trim() === "") {
    msg.innerHTML = "Veuillez saisir une durée.";
    return false;
  } else {
    msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
    return true;
  }
}

function validerDescription() {
  var description = document.getElementById("description_a").value;
  var msg = document.getElementById("description_error");

  if (description.trim() === "") {
    msg.innerHTML = "Veuillez saisir une description.";
    return false;
  } else {
    msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
    return true;
  }
}

function validerFormateur() {
  var formateur = document.getElementById("formateur_a").value;
  var msg = document.getElementById("formateur_error");

  if (formateur === "") {
    msg.innerHTML = "Veuillez sélectionner un formateur.";
    return false;
  } else {
    msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
    return true;
  }
}

function validerNiveau() {
  var niveau = document.getElementById("niveau_a").value;
  var msg = document.getElementById("niveau_error");

  if (niveau === "") {
    msg.innerHTML = "Veuillez sélectionner un niveau.";
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

function validerIDFormation() {
  var id_formation = document.getElementById("id_formation").value;
  var msg = document.getElementById("id_formation_error");

  if (isNaN(parseFloat(id_formation)) || id_formation.trim() === "") {
    msg.innerHTML = "Veuillez saisir un ID formation valide.";
    return false;
  } else {
    msg.innerHTML = ""; // Effacer le message d'erreur s'il est correct
    return true;
  }
}
