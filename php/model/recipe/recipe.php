<?php
class Recipe
{
    private string $title; 
    private string $content; 
    private string $image; 
    private DateTime $created; 
    private DateTime $updated;
    private int $statut;
    private ?int $id;
    private int $catId;

    public function __construct($title, $content, $image, $created, $updated, $catId)
    {
        $this->title = $title; 
        $this->content = $content; 
        $this->image = $image;
        $this->created = new DateTime($created);
        $this->updated = new DateTime($updated);
        $this->statut = 1;
        $this->id = 1;
        $this->catId = $catId;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;
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
     * Get the value of content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param DateTime $created
     *
     * @return self
     */
    public function setCreated(DateTime $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of updated
     *
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @param DateTime $updated
     *
     * @return self
     */
    public function setUpdated(DateTime $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get the value of cat_Id
     *
     * @return int
     */
    public function getCatId(): int
    {
        return $this->catId;
    }

    /**
     * Set the value of cat_Id
     *
     * @param int $cat_Id
     *
     * @return self
     */
    public function setCatId(int $catId): self
    {
        $this->catId = $catId;

        return $this;
    }
}

?>