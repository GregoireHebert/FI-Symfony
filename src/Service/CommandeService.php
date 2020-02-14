<?php

declare(strict_types=1);

namespace App\Service;
use App\Entity\Commande;
use App\ORM\EntityManager;

final class CommandeService {

    protected $em;
    private $currentCommande;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function afficherCommande(Commande $commande){
        echo("<h3>Commande</h3>");
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
            $addition += $produit->getPrix();
        }
        return $addition;
    }

    private function getCurrentCommande(): Commande
    {
        return $this->$currentCommande;
    }

    private function setCurrentCommande(Commande $commande){
        $this->$currentCommande = $commande;
    }

}
