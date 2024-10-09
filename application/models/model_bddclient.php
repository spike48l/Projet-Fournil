<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_bddclient extends CI_Model
{
 public function __construct()
 {
	parent::__construct();
 }
    public function getClients()
    {
	    $search = "SELECT * FROM client";
	    $result = $this->db->conn_id->prepare($search);
	    $result->execute();
	    $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	   // $this->db = null ;
	    return $query_result; 
    }
 
   public function getPains() {
    $search = "SELECT * FROM vueProduit WHERE `Reference` LIKE 'P%'";  // Utilise ta vue 'vueProduit'
    $result = $this->db->conn_id->prepare($search);
    $result->execute();
    $query_result = $result->fetchAll(PDO::FETCH_ASSOC);
    // V�rification des r�sultats

    return $query_result;
}

   public function getViennoiseries()
   {
	$search = "SELECT * FROM vueProduit WHERE `Reference` LIKE 'V%'";
	$result = $this->db->conn_id->prepare($search);
	$result->execute();
	$query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	//$this->db = null ;
	return $query_result; 
   }

   public function getSpecialites()
   {
	$search = "SELECT * FROM vueProduit WHERE `Reference` LIKE 'S%'";
	$result = $this->db->conn_id->prepare($search);
	$result->execute();
	$query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	//$this->db = null ;
	return $query_result; 
   }
   public function getAllproduits(){
	$search = "SELECT * FROM vueProduit";
	$result = $this->db->conn_id->prepare($search);
	$result->execute();
	$query_result = $result->fetchAll(PDO::FETCH_ASSOC);
	//$this->db = null ;
	return $query_result; 
   }

 public function setClients($idClient,$mdp,$nom,$email,$numRue,$nomRue,$codePostal,$ville,$telephone,$clientPro)
 {
	$mdp = md5($mdp);
	 $search = "INSERT INTO client(idClient,mdpClient,nomClient,emailClient,numRue,nomRue,codePostal,ville,telephoneClient,clientPro) VALUES(:idClient,:mdpClient,:nomClient,:emailClient,:numRue,:nomRue,:codePostal,:ville,:telephone,:clientPro);";
	 $result = $this->db->conn_id->prepare($search);
	 $result->bindParam(':idClient', $idClient);
	 $result->bindParam(':mdpClient', $mdp);
	 $result->bindParam(':nomClient', $nom);
	 $result->bindParam(':emailClient', $email);
	 $result->bindParam(':numRue', $numRue);
	 $result->bindParam(':nomRue', $nomRue);
	 $result->bindParam(':codePostal', $codePostal);
	 $result->bindParam(':ville', $ville);
	 $result->bindParam(':telephone', $telephone);
	 $result->bindParam(':clientPro', $clientPro);
	 $result->execute();
	 return $result->rowCount()>0; 
 }
}
?>