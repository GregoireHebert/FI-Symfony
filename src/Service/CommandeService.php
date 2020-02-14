<?php

declare(strict_types=1);

namespace App\Service;
use App\Entity\Commande;
use App\ORM\EntityManager;

final class CommandeService {

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function afficherCommande(Commande $commande){
        foreach($commande->getProduits() as $produit){
            echo($produit->getNom()."       ".$produit->getPrix());
        }
        foreach($commande->getMenus() as $menu){
            echo($menu->getId()."  ".$produit->getPrix());
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

}
