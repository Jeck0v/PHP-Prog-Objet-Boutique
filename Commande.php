<?php

class Commande {
    public $produitsCommandes = array();
    public $modeLivraison;

    public function __construct($produitsCommandes, $modeLivraison) {
        $this->produitsCommandes = $produitsCommandes;
        $this->modeLivraison = $modeLivraison;
    }

    public function calculerTotalCommande() {
        $total = 0;
        foreach ($this->produitsCommandes as $item) {
            $total += $item['produit']->prixUnitaireTTC * $item['quantite'];
        }
        $total += $this->modeLivraison;
        return $total;
    }
}