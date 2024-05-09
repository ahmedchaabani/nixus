<?php 

class forum{
    private ? int $id=null;

   private string $categorie;
   private string $titre;
   private  string $message;
   private string $image;
   private  string $date;

    public $userAttributeCount=6;

    function getcategorie(){
        return $this->categorie;
    }
    function gettitre(){
        return $this->titre;
    }
    function getmessgae(){
        return $this->message;
    }
    function getimage(){
        return $this->image;
    }
    function getdate(){
        return $this->date;
    }

    
    function __construct($categorie,$titre,$message,$image,$date){
        $this->categorie = $categorie;
        $this->titre = $titre;
        $this->image = $image;
        $this->message = $message;
        $this->date = $date;
    }
    


    function affichage(){  
    } 
}
?>


