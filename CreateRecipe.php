<?php

declare(strict_types=1);

namespace Application\UseCases\Recipes;

final class CreateRecipe
{
    public function __construct(
        private string $id,
        private string $name,
        private array $ingredients,
        private array $steps,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getSteps(): array
    {
        return $this->steps;
    }
}
