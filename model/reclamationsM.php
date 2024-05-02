<?php
include '../config.php';

class Reclamations
{ 
    private $id;
    private $reclamation;
    private $date; // New property for date
    
    public function __construct($id, $reclamation, $date){
        $this->id = $id;
        $this->reclamation = $reclamation;
        $this->date = $date; // Initialize the date property
    }

    public function getId(){
        return $this->id;
    }

    public function getReclamation(){
        return $this->reclamation;
    }

    public function getDate(){
        return $this->date;
    }
}
?>

