<?php

declare(strict_types=1);

namespace App\Service;

final class CategorieService {

    protected $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function listerCategories() : array{
        return $this->em->findAll("categorie");
    }

    public function listerProduitsParCategorie(int $ref) : array {
        $result = [];
        $allProduits = $this->em->findAll("produit");
        $categorie = $this->em->find("categorie", $ref);
        foreach($allProduits as $produit) {
            if(in_array($produit,$categorie->getProduits())){
                array_push($produit,$result);
            }
        }
        return $result;

    }
}
