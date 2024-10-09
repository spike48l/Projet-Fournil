<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller {
    public function autocomplete() {
        $this->load->model('CityModel');
        $keyword = $this->input->get('keyword');
        $data = $this->CityModel->getCities($keyword);
        echo json_encode($data);
    }
}
