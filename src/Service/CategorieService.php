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
        foreach($allProduits as $produit) {
            if($produit->$ref == $ref) {
                array_push($result,$produit);
            }
        }
        return $result;

    }
}
