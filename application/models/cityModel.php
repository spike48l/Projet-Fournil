<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CityModel extends CI_Model {
    public function getCities($keyword) {
        $this->db->like('name', $keyword); // Remplacez 'name' par le nom de votre colonne
        $query = $this->db->get('cities'); // Remplacez 'cities' par le nom de votre table
        return $query->result();
    }
}
?>