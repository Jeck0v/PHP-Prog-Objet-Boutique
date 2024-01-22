<?php

require_once ('./class/Produit.php');
require_once ('./class/Panier.php');
require_once ('./class/Livraison.php');
require_once ('./class/Commande.php');
require_once ('./class/Boutique.php');

class Client {
    public $nom;
    public $adresse;
    public $panier;
    public $modeLivraison;

    public function __construct($nom, $adresse, $panier, $modeLivraison) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->panier = $panier;
        $this->modeLivraison = $modeLivraison;
    }
}