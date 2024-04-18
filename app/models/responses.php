<?php

//on charge le fichier mère du modèle
require "app/core/model.php";

//classe ProductsModel instanciée de la classe Model
class ResponsesModel extends Model {

    //initialisation de la classe
	public function __construct() {
		parent::__construct();
	}

    //on récupère la liste des produits de la base de données
	public function get_responses() {
		return $this->select("SELECT * FROM responses");
	}

    //on insère un produit dans la base de données
	public function add_responses($response) {
		$this->execute("INSERT INTO responses (response) VALUES ('$response')");
	}

    //on met à jour un produit de la base de données
	public function update_responses($old_response, $new_response) {
		$this->execute("UPDATE responses SET response='$new_response' WHERE response='$old_response'");
	}

    //on supprime un produit de la base de données
	public function delete_responses($response) {
		$this->execute("DELETE FROM responses WHERE response='$response' LIMIT 1");
	}
}
?>
