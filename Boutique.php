<?php

require_once ('./class/Produit.php');
require_once ('./class/Panier.php');
require_once ('./class/Livraison.php');
require_once ('./class/Commande.php');

class Boutique {
    public $produits = array();
    public $stock = array();
    public $modesLivraison;

    public function __construct($modesLivraison) {
        $this->modesLivraison = $modesLivraison;
    }

    public function ajouterProduit($produit, $stockInitial) {
        if (!isset($this->produits[$produit->nom])) {
            $this->produits[$produit->nom] = $produit;
            $this->stock[$produit->nom] = $stockInitial;
        }
    }

    public function afficherProduits() {
        foreach ($this->produits as $nom => $produit) {
            echo "$nom : Stock = " . $this->stock[$nom] . "<br>";;
        }
    }

    public function afficherModesLivraison() {
        $this->modesLivraison->afficherModesLivraison();
    }

    public function effectuerVente($client, $modeLivraison) {
        $produitsVendus = $client->panier->produits;
        foreach ($produitsVendus as $item) {
            $this->stock[$item['produit']->nom] -= $item['quantite'];
        }

        $commande = new Commande($produitsVendus, $modeLivraison);
        $totalCommande = $commande->calculerTotalCommande();

        $client->panier->produits = array(); // Vider le panier
        echo "Vente effectuée. Total de la commande : $totalCommande "."<br>";
    }
}