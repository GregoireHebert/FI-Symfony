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
        return $this->em->findAll(CategorieEntity::class);
    }

    public function listerProduitsParCategorie(int $ref) : array {
        $result = [];
        $allProduits = $this->em->findAll(Produit::class);
        $categorie = $this->em->find(CategorieEntity::class, $ref);
        foreach($allProduits as $produit) {
            if(in_array($produit,$categorie->getProduits())){
                array_push($produit,$result);
            }
        }
        return $result;

    }
}
