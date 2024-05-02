<?php
include '../config.php';
class Responses
{ 
    private  $id;
    private  $response;
    
    public function __construct($id, $response){
        $this->id = $id;
        $this->response = $response;
    }

    public function getId(){
        return $this->id;
    }

    public function getResponse(){
        return $this->response;
    }
}
?>
