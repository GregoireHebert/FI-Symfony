<?php

namespace App\Entity;

interface CommandInterface extends IdentifiableTraitInterface
{
    public function getProducts(): array;

    public function setProducts(array $products);

    public function getMenus(): array;

    public function setMenus(array $menus);

    public function getStatus(): bool;

    public function setStatus(bool $status);

    public function addProduct(ProductInterface $product);
    
    public function addMenu(MenuInterface $menu);
}
