<?php

namespace App\IngredientFactory;


use App\Entity\Ingredient;

class IngredientFactory
{

    public function createIngredient(): Ingredient
    {
        return new Ingredient();
    }
}