<?php

declare(strict_types=1);

namespace Application\UseCases\Recipes;

use Domain\Model\Recipes\Recipe;
use Domain\Model\Recipes\Recipe\ValueObject\Ingredients;
use Domain\Model\Recipes\Recipe\ValueObject\Name;
use Domain\Model\Recipes\Recipe\ValueObject\RecipeId;
use Domain\Model\Recipes\Recipe\ValueObject\Steps;
use Domain\Model\Recipes\RecipeRepository;

final class HandleCreateRecipe
{
    public function __construct(
        private RecipeRepository $recipeRepository,
    ) {
    }

    public function execute(CreateRecipe $createRecipe): void
    {
        $recipe = Recipe::create(
            RecipeId::fromString($createRecipe->getId()),
            Name::fromString($createRecipe->getName()),
            Ingredients::fromArray($createRecipe->getIngredients()),
            Steps::fromArray($createRecipe->getSteps())
        );

        $this->recipeRepository->add($recipe);
    }
}
