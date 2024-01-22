<?php

class Livraison {
    public $modes = array();

    public function ajouterModeLivraison($libelle, $tarif) {
        $this->modes[$libelle] = $tarif;
    }

    public function afficherModesLivraison() {
        foreach ($this->modes as $libelle => $tarif) {
            echo "$libelle : $tarif\n";
        }
    }
}