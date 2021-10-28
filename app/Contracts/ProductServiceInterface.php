<?php


namespace App\Contracts;


interface ProductServiceInterface
{
    public function findProductById($id);

    public function getProductsByCategory($categoryId);
}
