<?php
class Atelier{
    
    // declaration des attributs
    private ?int $id=null ;
    private string $nom_a;
    private string $dure_f;
    private string $description_a;
    private string $formateur_a;
    private string $niveau_a;
    private int $id_user;
    private int $id_formation;
   
    // declaration du constructeur
    public function __construct($i=null, $n, $du, $d, $f, $ni, $iu, $iff ){
        $this->id=$i;
        $this->nom_a=$n;
        $this->dure_a=$du;
        $this->description_a=$d;
        $this->formateur_a=$f;
        $this->niveau_a=$ni;
        $this->id_user=$iu;
        $this->id_formation=$iff;
        
    }

    
    // declaration des getters & setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
 
    public function getNom_a()
    {
        return $this->nom_a;
    }
    public function setNom_a($nom_a)
    {
        $this->nom_a = $nom_a;

        return $this;
    }


    public function getDure_a()
    {
        return $this->dure_a;
    }
    public function setDure_a($dure_a)
    {
        $this->dure_a = $dure_a;

        return $this;
    }


    public function getDescription_a()
    {
        return $this->description_a;
    }
    public function setDescription_a($description_a)
    {
        $this->description_a = $description_a;

        return $this;
    }


    public function getFormateur_a()
    {
        return $this->formateur_a;
    }
    public function setFormateur_a($formateur_a)
    {
        $this->formateur_a = $formateur_a;

        return $this;
    }

    public function getNiveau_a()
    {
        return $this->niveau_a;
    }
    public function setNiveau_a($niveau_a)
    {
        $this->niveau_a = $niveau_a;

        return $this;
    }

    public function getId_user()
    {
        return $this->id_user;
    }
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getId_formation()
    {
        return $this->id_formation;
    }
    public function setId_formation($id_formation)
    {
        $this->id_formation = $id_formation;

        return $this;
    }


}

?>