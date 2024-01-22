<?php

class Panier {
    public $produits = array();

    public function ajouterProduit($produit, $quantite) {
        if (!isset($this->produits[$produit->nom])) {
            $this->produits[$produit->nom] = array('produit' => $produit, 'quantite' => $quantite);
        } else {
            $this->produits[$produit->nom]['quantite'] += $quantite;
        }
    }

    public function calculerTotal() {
        $total = 0;
        foreach ($this->produits as $item) {
            $total += $item['produit']->prixUnitaireTTC * $item['quantite'];
        }
        return $total;
    }
}