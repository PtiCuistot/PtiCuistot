<?php

class IngredientWeight
{

    private ?int $id;
    private int $recipeId; 
    private int $ingredientId;
    private int $weight; 
    private string $unity;

    public function __construct(int $recipeId, int $ingredientId, int $weight, string $unity)
    {
        $this->recipeId = $recipeId; 
        $this->ingredientId = $ingredientId; 
        $this->weight = $weight; 
        $this->unity = $unity;
    }

    /**
     * Get the value of id
     *
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param ?int $id
     *
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of recipeId
     *
     * @return int
     */
    public function getRecipeId(): int
    {
        return $this->recipeId;
    }

    /**
     * Set the value of recipeId
     *
     * @param int $recipeId
     *
     * @return self
     */
    public function setRecipeId(int $recipeId): self
    {
        $this->recipeId = $recipeId;

        return $this;
    }

    /**
     * Get the value of ingredientId
     *
     * @return int
     */
    public function getIngredientId(): int
    {
        return $this->ingredientId;
    }

    /**
     * Set the value of ingredientId
     *
     * @param int $ingredientId
     *
     * @return self
     */
    public function setIngredientId(int $ingredientId): self
    {
        $this->ingredientId = $ingredientId;

        return $this;
    }

    /**
     * Get the value of weight
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @param int $weight
     *
     * @return self
     */
    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of unity
     *
     * @return string
     */
    public function getUnity(): string
    {
        return $this->unity;
    }

    /**
     * Set the value of unity
     *
     * @param string $unity
     *
     * @return self
     */
    public function setUnity(string $unity): self
    {
        $this->unity = $unity;

        return $this;
    }
}