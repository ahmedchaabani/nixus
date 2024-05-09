<?php 

class article{
    private ? int $idArt=null;

   private string $titreArt;
   private  string $messageArt;
   private  string $dateArt;

    public $userAttributeCount=4;

    function gettitreArt(){
        return $this->titreArt;
    }
    function getmessageArt(){
        return $this->messageArt;
    }

    function getdateArt(){
        return $this->dateArt;
    }

    
    function __construct($titreArt,$messageArt,$dateArt){
        $this->titreArt = $titreArt;
        $this->messageArt = $messageArt;
        $this->dateArt = $dateArt;
    }
    


    function affichage(){  
    } 
}
?>


