<?php
//Exemple d'architecture MVC en PHP par eliseekn -> 59434291/43403398 - eliseekn@gmail.com

//on charge le fichier mère du controlleur
require "app/core/controller.php";
//on charge le fichier modèle des produits
require "app/models/responses.php";

//classe ProductsController instanciée de la classe Controlleur
class ResponsesController extends Controller {

	private $responses;

    //initialisation de la classe
	public function __construct() {
		parent::__construct();

		//initialisation de la classe modèle des produits
		$this->responses = new ResponsesModel();
	}

	private function render() {
		$this->view->render("responses", [
                "title" => "Architecture MVC en PHP - responses",
                "responses" => $this->responses->get_responses() //on récupère la liste des produits de la base de données
            ]
        );
	}

    //on affiche la page products avec une variable title définie
	public function index() {
		$this->render();
	}

    //on affiche la page products avec une variable title définie
	public function add_responses($response) {
		$this->responses->add_responses($response);
		$this->render(); //on actualise la page
	}

    //on affiche la page products avec une variable title définie
	public function update_responses($old_response, $new_response) {
		$this->responses->update_responses($old_response, $new_response);
		$this->render();  //on actualise la page
	}

    //on affiche la page products avec une variable title définie
	public function delete_responses($response) {
		$this->responses->delete_responses($response);
		$this->render(); //on actualise la page
	}
}
?>
