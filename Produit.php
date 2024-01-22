<?php

class Produit {
    public $nom;
    public $prixUnitaireHT;
    public $tva;
    public $prixUnitaireTTC;

    public function __construct($nom, $prixUnitaireHT, $tva) {
        $this->nom = $nom;
        $this->prixUnitaireHT = $prixUnitaireHT;
        $this->tva = $tva;
        $this->prixUnitaireTTC = $this->calculerPrixTTC();
    }

    private function calculerPrixTTC() {
        return $this->prixUnitaireHT * (1 + $this->tva / 100);
    }
}