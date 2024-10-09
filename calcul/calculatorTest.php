<?php
class CalculatorTest{
    private $calculator;
    
    public function __construct(){
        //Initialiser l'objet Calculator que nous allons tester
        $this->calculator=new Calculator();

    }
    //Méthode pour tester l'addition
    public function testAdd() {
        $result =$this->calculator->add(5,3);
        $expected = 0;
        if ($result === $expected){
            echo "testAdd PASSED\n";

        }else{
            echo "testAdd FAILED : Expected $expected but got $result\n";
        }
        //Appeler la méthode displayResult pour afficher le résultat
        $this->calculator->displayResult();

    }
    //Méthode pour tester la soustraction
    public function testSubtract(){
        $result = $this->calculator->substract(5,3);
        $expected = 2;
        if($result === $expected){
            echo "testSubtract PASSED\n";

        }else{
            echo "testSubstract FAILED: Expected $expected but got $result\n";

        }
        //Appeler la méthode displayResult pour afficher le résultat
        $this->calculator->displayResult();
        }
    //Méthode pour tester le setter et le getter 
    public function testSetAndGetResult(){
        $this->calculator->setResult(100);
        $result = $this->calculator->getResult();
        $expected =100;
        if($result === $expected){
            echo "testSetAndGetResult PASSED\n";
        }else{
            echo "testSetAndGetResult FAILED: Expected $expected but got $result\n";

        }
        //afficher le résultat
        $this->calculator->displayResult();
    }
    public function __destruct(){
        echo "Tests terminés.\n";
    }    
   
};