<?php

class cours {
    private int $reference;
    public string $salaire;
    public string $description;
    public string $mail;
    public string $nom_societe;
    public string $type_offre;
    public string $qr_code;

    public function __construct(int $reference, string $salaire, string $description, string $mail, string $nom_societe, string $type_offre, string $qr_code) {
        $this->reference = $reference;
        $this->salaire = $salaire;
        $this->description = $description;
        $this->mail = $mail;
        $this->nom_societe = $nom_societe;
        $this->type_offre = $type_offre;
        $this->qr_code = $qr_code;
    }
    

    
    
    


    /**
     * Get the value of reference
     */ 
    public function getreference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setreference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of salaire
     */ 
    public function getsalaire()
    {
        return $this->salaire;
    }

    /**
     * Set the value of salaire
     *
     * @return  self
     */ 
    public function setsalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getmail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setmail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of nom_societe
     */ 
    public function getnom_societe()
    {
        return $this->nom_societe;
    }

    /**
     * Set the value of nom_societe
     *
     * @return  self
     */ 
    public function setnom_societe($nom_societe)
    {
        $this->nom_societe = $nom_societe;

        return $this;
    }

    /**
     * Get the value of type_offre
     */ 
    public function gettype_offre()
    {
        return $this->type_offre;
    }

    /**
     * Set the value of type_offre
     *
     * @return  self
     */ 
    public function settype_offre($type_offre)
    {
        $this->type_offre = $type_offre;

        return $this;
    }

    /**
     * Get the value of qr_code
     */ 
    public function getqr_code()
    {
        return $this->qr_code;
    }

    /**
     *
     * @return  self
     */ 
    public function setqr_code($qr_code)
    {
        $this->qr_code = $qr_code;

        return $this;
    }


}

?>
