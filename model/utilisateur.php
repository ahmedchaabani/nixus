<?php

class Utilisateur {
    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $passwordRetype; 
    private $role;

    public function __construct($id, $pseudo, $email, $password,$passwordRetype, $role) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRetype = $passwordRetype;
        $this->role = $role;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    // Setters
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setPasswordRetype($passwordRetype) {
        $this->passwordRetype = $passwordRetype;
    }

    public function getPasswordRetype() {
        return $this->passwordRetype;
    }

}

?>
