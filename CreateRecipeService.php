<?php

declare(strict_types=1);

namespace Application\UseCases\Recipes;

use Domain\Model\Recipes\Recipe;
use Domain\Model\Recipes\Recipe\ValueObject\Ingredients;
use Domain\Model\Recipes\Recipe\ValueObject\Name;
use Domain\Model\Recipes\Recipe\ValueObject\RecipeId;
use Domain\Model\Recipes\Recipe\ValueObject\Steps;
use Domain\Model\Recipes\RecipeRepository;

final class CreateRecipeService
{
    public function __construct(
        private RecipeRepository $recipeRepository,
    ) {
    }

    public function execute(
        string $id,
        string $name,
        array $ingredients,
        array $steps,
    ): void {
        $recipe = Recipe::create(
            RecipeId::fromString($id),
            Name::fromString($name),
            Ingredients::fromArray($ingredients),
            Steps::fromArray($steps)
        );

        $this->recipeRepository->add($recipe);
    }
}
