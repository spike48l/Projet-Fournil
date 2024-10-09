<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL        
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() {
		parent::__construct();
		$this->load->database(); // Chargement du fichier de configuration database lors du démarrage de codeigniter
		$this->load->helper('url_helper');// Charger des fonctions de bases pour gérer les URL
		$this->load->helper('form');
		$this->load->model('model_bddclient','requetes');
		// Chargement du modèle model_bddclient.php associé au label requetes
		$this->load->library('form_validation');
		 
	}

	public function index()
	{
		$this->load->view('enTete'); // créer un fichier enTete.php dans le répertoire views
		// $this->load->view('menu'); // créer un fichier menu.php dans le répertoire views
		$this->load->view('affichage'); // créer affichage.php dans le répertoire views
		//$data['clients']= $this->requetes->getClients();
		$data['pains']= $this->requetes->getPains();
		$this->load->view('piedPage',$data); // Vue piedPage à créer dans le dossier VIEWS
		// $this->load->view('piedPage',NULL); // Vue piedPage à créer dans le dossier VIEWS
	}

	// public function Formulaire()
	// {
		// $data['pains']= $this->requetes->getPains();
		// $this->load->view('enTete'); // créer un fichier enTete.php dans le répertoire views
		// $this->load->view('menu'); // créer un fichier menu.php dans le répertoire views
		// $this->load->view('Formulaire',$data); // créer affichage.php dans le répertoire views
		 // $this->load->view('piedPage'); // Vue piedPage à créer dans le dossier VIEWS
		// // $this->load->view('piedPage',NULL); // Vue piedPage à créer dans le dossier VIEWS
	// }

	public function contenu($id)
{
    $this->load->view('enTete'); // Charge l'en-tête

    if ($id == "Pains") {
        $data['pains'] = $this->requetes->getPains(); // Récupère les données
        $this->load->view('Pains', $data); // Charge la vue 'pains'
    } elseif ($id == "Viennoiseries") {
        $data['Viennoiseries'] = $this->requetes->getViennoiseries();
        $this->load->view('viennoiseries', $data);
    } elseif ($id == "Specialites") {
        $data['specialites'] = $this->requetes->getSpecialites();
        $this->load->view('Specialites', $data);
    } elseif($id=='seConnecter'){
		$this->load->view('Connexion');
	}elseif($id=='nouveauClient'){
		$this->load->view('nouveauClient');
    }elseif($id=='commandes'){
        $this->load->view('commandes');
    }

    $this->load->view('piedPage'); // Charge le pied de page
}


public function traitementConnexion() {
    // Vérifie si la requête est une soumission de formulaire
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $user = $this->input->post('user');
        $password = $this->input->post('password');

        // Vérifie si les champs ne sont pas vides
        if (!empty($user) && !empty($password)) { 
            try {
                // Préparation de la requête pour prévenir les injections SQL
                $stmt = $this->db->conn_id->prepare("SELECT * FROM CLIENT WHERE idClient = :user");
                $stmt->bindParam(':user', $user);
                $stmt->execute();

                $userData = $stmt->fetch(PDO::FETCH_ASSOC);
                $password=md5($password);
                if ($userData) {
                    // Vérification du mot de passe
                    if ($password === $userData['mdpClient']) {
                        $this->session->sess_regenerate(true); // Régénère l'ID de session
                        $this->session->set_userdata('user', $userData['idClient']); // Stocke l'ID utilisateur dans la session
                        $this->load->view('enTete2');
                        $data['produit']= $this->requetes->getAllProduits();
                        $this->load->view('commandes', $data);// Redirige vers la page des commandes
                    } else {
                        $this->session->set_flashdata('error', "Nom d'utilisateur ou mot de passe invalide");
                        $this->load->view('enTete');
                        $this->load->view('Connexion');
                    }
                } else {
                    $this->session->set_flashdata('error', "Nom d'utilisateur ou mot de passe invalide");
                    $this->load->view('enTete');
                    $this->load->view('Connexion');
                }
            } catch (PDOException $e) {
                $this->session->set_flashdata('error', "Erreur: " . $e->getMessage());
                $this->load->view('enTete');
                $this->load->view('Connexion');
            }
        } else {
            $this->session->set_flashdata('error', "Tous les champs doivent être remplis");
            $this->load->view('enTete');
            $this->load->view('Connexion');
        }
    }
}

    public function nouveauClients(){
        if($this->input->server('REQUEST_METHOD') === 'POST') {
            $nomC = $this->input->post('nomClient');
            $emailC = $this->input->post('email');
            $phoneC = $this->input->post('phone');
            $numRueC = $this->input->post('numRue');
            $rueC = $this->input->post('rue');
            $cpC = $this->input->post('codePostal');
            $villeC = $this->input->post('ville');
            $clientProC = $this->input->post('pro');
            $idClient = $this->input->post('idClient');
            $pwd2C = $this->input->post('confirm_password');   

            $insert = $this->requetes->setClients($idClient,$pwd2C,$nomC,$emailC,$numRueC,$rueC,$cpC,$villeC,$phoneC,$clientProC);
            if($insert){
                $this->load->view('enTete');
                $this->load->view('Connexion');
            } 
        }
        
        
    }

    public function passerCommande() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Vérifie que l'utilisateur est connecté
            if ($this->session->userdata('user')) {
                $idClient = $this->session->userdata('user'); // Récupère l'ID du client à partir de la session
    
                // Récupérer numClient à partir de idClient
                $clientData = $this->db->get_where('CLIENT', ['idClient' => $idClient])->row();
                
                if (!$clientData) {
                    echo "Le client n'existe pas.";
                    return;
                }
    
                $numClient = $clientData->numClient; // Récupérer numClient
                
                // Récupérer les données du formulaire
                $references = $this->input->post('reference'); // tableau des références
                $quantites = $this->input->post('quantite'); // tableau des quantités
                $total = $this->input->post('total'); // montant total de la commande
    
                // Vérifie que total n'est pas NULL ou 0
                if (empty($total) || $total <= 0) {
                    echo "Le montant total de la commande doit être supérieur à 0.";
                    return;
                }
    
                // Commencer une transaction
                $this->db->trans_start();
    
                // Insérer la commande dans la base de données
                $this->db->insert('COMMANDE', [
                    'numClient' => $numClient, // Utiliser numClient récupéré
                    'totalCommande' => $total // insérer le total de la commande
                ]);
    
                // Récupérer le dernier numCommande inséré
                $numCommande = $this->db->insert_id(); // Plus de +1 ici, insert_id() donne le bon ID.
    
                // Boucle pour insérer chaque produit dans une table associée (ex : COMMANDE_PRODUITS)
                foreach ($references as $index => $refProduit) {
                    $data = [
                        'numCommande' => $numCommande,
                        'refProduit' => $refProduit,
                        'quantite' => $quantites[$index],
                    ];
    
                    // Insérer chaque produit dans la table COMMANDE_PRODUITS
                    $this->db->insert('COMMANDE_PRODUITS', $data);
                }
    
                // Insérer la facture
                $this->db->insert('FACTURE', [
                    'numCommande' => $numCommande,
                    'montantTotal' => $total // montant total de la facture
                ]);
    
                // Compléter la transaction
                $this->db->trans_complete();
    
                // Vérification si la transaction a échoué
                if ($this->db->trans_status() === FALSE) {
                    // Si une erreur s'est produite, tout annuler
                    echo "Une erreur est survenue lors de la création de la commande.";
                } else {
                    redirect("welcome/index");
                }
            } else {
                echo "Vous devez être connecté pour passer une commande.";
            }
        }
    }
    
    

    
}




