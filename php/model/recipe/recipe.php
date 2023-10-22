<?php
class Recipe
{
    private string $title; 
    private string $content; 
    private string $image; 
    private string $created; 
    private string $updated;
    private int $statut;
    private ?int $id;

    public function __construct($title, $content, $image, $created, $updated)
    {
        $this->title = $title; 
        $this->content = $content; 
        $this->image = $image;
        $this->created = $created; 
        $this->updated = $updated;
        $this->statut = 1;
        $this->id = 1;
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
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param string $created
     *
     * @return self
     */
    public function setCreated(string $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of updated
     *
     * @return string
     */
    public function getUpdated(): string
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @param string $updated
     *
     * @return self
     */
    public function setUpdated(string $updated): self
    {
        $this->updated = $updated;

        return $this;
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
        if($this->id == null)
        {
            $this->id = $id;
            return $this;
        }
        else
        {
            throw new Exception("Cannot redifined ID");
        }
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