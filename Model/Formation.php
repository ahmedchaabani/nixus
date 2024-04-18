<?php
class Formation{
    
    // declaration des attributs
    private ?int $id=null ;
    private string $nom_f;
    private string $type_f;
    private string $description_f;
    private string $etat_f;
    private float $cout_f;
    private int $id_user;
    private string $date_debut;
    private string $date_fin;
    // declaration du constructeur
    public function __construct($i=null, $n, $t, $d, $e, $c, $iu, $dd, $df ){
        $this->id=$i;
        $this->nom_f=$n;
        $this->type_f=$t;
        $this->description_f=$d;
        $this->etat_f=$e;
        $this->cout_f=$c;
        $this->id_user=$iu;
        $this->date_debut=$dd;
        $this->date_fin=$df;
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
 
    public function getNom_f()
    {
        return $this->nom_f;
    }
    public function setNom_f($nom_f)
    {
        $this->nom_f = $nom_f;

        return $this;
    }


    public function getType_f()
    {
        return $this->type_f;
    }
    public function setType_f($type_f)
    {
        $this->type_f = $type_f;

        return $this;
    }


    public function getDescription_f()
    {
        return $this->description_f;
    }
    public function setDescription_f($description_f)
    {
        $this->description_f = $description_f;

        return $this;
    }


    public function getEtat_f()
    {
        return $this->etat_f;
    }
    public function setEtat_f($etat_f)
    {
        $this->etat_f = $etat_f;

        return $this;
    }

    public function getCout_f()
    {
        return $this->cout_f;
    }
    public function setCout_f($cout_f)
    {
        $this->cout_f = $cout_f;

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

    public function getDate_debut()
    {
        return $this->date_debut;
    }
    public function setDate_debut($date_debut)
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDate_fin()
    {
        return $this->date_fin;
    }
    public function setDate_fin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }
}

?>