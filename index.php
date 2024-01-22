<?php
//créer un dossier class et y mettre tout les autre fichier sauf index.php
require_once ('./class/Boutique.php');
require_once ('./class/Client.php');


$modesLivraison = new Livraison();
$modesLivraison->ajouterModeLivraison("Standard", 5);
$modesLivraison->ajouterModeLivraison("Express", 10);

$boutique = new Boutique($modesLivraison);


$produit1 = new Produit("Produit 1", 5, 20);
$produit2 = new Produit("Produit 2", 10, 20);

$boutique->ajouterProduit($produit1, 50);
$boutique->ajouterProduit($produit2, 30);

$client1Panier = new Panier();
$client1Panier->ajouterProduit($produit1, 3);
$client1Panier->ajouterProduit($produit2, 2);
$client1 = new Client("Jerôme", "Adresse 1", $client1Panier, $modesLivraison->modes["Standard"]);

$client2Panier = new Panier();
$client2Panier->ajouterProduit($produit1, 1);
$client2Panier->ajouterProduit($produit2, 5);
$client2 = new Client("Adrien", "19 rue Lucien Sampaix", $client2Panier, $modesLivraison->modes["Express"]);

$client3Panier = new Panier();
$client3Panier->ajouterProduit($produit1, 2);
$client3Panier->ajouterProduit($produit2, 3);
$client3 = new Client("Louise", "45 avenue Daumesnil", $client3Panier, $modesLivraison->modes["Standard"]);

// Affichage du total du panier pour chaque client
echo "Total du panier pour $client1->nom : " . $client1->panier->calculerTotal() . "<br>";
echo "Total du panier pour $client2->nom : " . $client2->panier->calculerTotal() . "<br>";
echo "Total du panier pour $client3->nom : " . $client3->panier->calculerTotal() . "<br>";

// Effectuer une vente pour chaque client
$boutique->effectuerVente($client1, $client1->modeLivraison);
$boutique->effectuerVente($client2, $client2->modeLivraison);
$boutique->effectuerVente($client3, $client3->modeLivraison);

// Affichage du stock mis à jour
$boutique->afficherProduits();
