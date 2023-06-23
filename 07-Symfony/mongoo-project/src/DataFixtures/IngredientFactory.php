<?php

namespace App\IngredientFactory;


class IngredientFactory
{

    public function createIngredient(): Ingredient
    {


        return new Ingredient;
    }
}