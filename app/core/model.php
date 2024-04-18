<?php


//classe mère des modèles
//cette classe gère toutes les opérations relatives à la bases de données

//variables d'accès à la base de données
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Alerts');

class Model {
    //variable de connection mysqli
    private $db;

    //initialisation de la classe
    public function __construct() {
        //conncetion à la base de donnée
        $this->db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        //afficher un message d'erreur en cas d'erreur de connection
        if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
		}
    }

    //exécution d'une requête mysql
    public function execute($query) {
        $query = mysqli_query($this->db, $query);

        //afficher un message d'erreur en cas d'erreur d'exécution de la requête
        if (!$query) {
            die(mysqli_error($this->db));
        }

        return $query;
    }

    //récupération des données d'un tableau
    public function select($query) {
        //exécution de la requête
        $query = $this->execute($query);

		//afficher un message d'erreur en cas d'erreur d'exécution de la requête
		if (!$query) {
			die(mysqli_error($this->db));
		}

        //on récupère toutes les données dans un tableau
        $data = [];
        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $data[] = $row['response'];
        }

		return $data;
    }
}
?>
