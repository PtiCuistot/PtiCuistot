<?php

class Category
{
    private ?int $id;
    private string $title; 
    private string $description; 
    private int $statut;

    public function __construct(string $title, string $description, int $statut)
    {
        $this->title = $title; 
        $this->description = $description; 
        $this->statut = $statut;
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
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of statut
     *
     * @return int
     */
    public function getStatut(): int
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @param int $statut
     *
     * @return self
     */
    public function setStatut(int $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}

?>