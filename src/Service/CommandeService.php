<?php

declare(strict_types=1);

namespace App\Service;
use App\Entity\Commande;
use App\ORM\EntityManager;
use App\Entity\Menu;
use App\Entity\Produit;

final class CommandeService {

    protected $em;
    private $currentCommande;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function afficherCommande(Commande $commande){
        foreach($commande->getProduits() as $produit){
            echo('<p>'.$produit->getNom()."       ".$produit->getPrix().'</p>');
        }
        foreach($commande->getMenus() as $menu){
            echo('<p>'.$menu->getId()."  ".$produit->getPrix().'</p>');
        }
    }

    public function calculerAddition(Commande $commande){
        $addition = 0;
        foreach($commande->getProduits() as $produit){
            $addition += $produit->getPrix();
        }
        foreach($commande->getMenus() as $menu){
            $addition += $menu->getPrix();
        }
        return $addition;
    }

    public function getCurrentCommande(): Commande
    {
        if($this->$currentCommande == null){
            //$this->$currentCommande = new Commande();
            //La ligne suivante est temporaire pour avoir une fausse commande à l'initialisation. A remplacer par la ligne précédente lorsque l'on pourra ajouter des produits/menus à la commande courante
            $this->createFakeCommande();
        }
        return $this->$currentCommande;
    }

    public function setCurrentCommande(Commande $commande){
        $this->$currentCommande = $commande;
    }

    private function createFakeCommande(){
        $this->$currentCommande = new Commande();
        $produit = new Produit();
        $produit->setPrix(3.0);
        $produit->setNom('Frites');
        $menu = new Menu();
        $menu->setPrix(9.5);
        $this->$currentCommande->addProduit($produit);
        $this->$currentCommande->addMenu($menu);

    }

}
