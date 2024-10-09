<?php
class Calculator{
    private $result; // propriété privée pour stocker le dernier résultat

    //Constructeur qui initialise la propriété result à 0
    public function __construct(){
        $this->result=0;
        echo "Calculator créé.\n";
    }
    //Méthode pour additionner deux nombres
    public function add($a,$b){
        $this->result = $a+$b;
        return $this->result;
    }
    //Méthode pour soustraire deux nombres
    public function substract($a,$b)
    {
        
        $this->result = $a-$b;
        return $this->result;
    }

    //Getter pour accéder à la valeur de la propriété $result
    public function getResult(){
        return $this ->result;
    }
    //Setter pour modifier la valeur de la propriété $result
    public function setResult($value){
        if(is_numeric($value)){ // Vérifie si la valeur est numérique
            $this->result=$value;
        }
    }
    //Méthode d'affichage du résultat
    public function displayResult(){
        echo "Le résultat actuel est : " .$this->result."\n";
    }
    //Destructeur qui affiche un message à la destruction de l'objet
    public function __destruct(){
        echo "Calculator détruit.\n";
    }

}