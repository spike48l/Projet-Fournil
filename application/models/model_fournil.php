<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_bddclient extends CI_Model
{
 public function __construct()
 {
	parent::__construct();
 }
 
 public function getPains()
{
    $this->db->where('codeCategorie', 'P'); // Utilise Active Record pour ajouter une condition
    $query = $this->db->get('vueProduit'); // Récupère les données de la table 'produit'
    
    return $query->result_array(); // Retourne le résultat sous forme de tableau associatif
}


}
?>