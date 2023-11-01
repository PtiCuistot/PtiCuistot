<?php
class Recipe
{
    private int $userId;
    private string $title; 
    private string $content; 
    private string $image; 
    private int $note;
    private DateTime $created; 
    private DateTime $updated;
    private int $validate;
    private int $statut;
    private ?int $id;
    private int $catId;

    public function __construct($userId, $title, $content, $image, $note, $created, $updated, $validate = 0, $catId = 1)
    {
        $this->userId = $userId;
        $this->title = $title; 
        $this->content = $content; 
        $this->image = $image;
        $this->note = $int;
        $this->created = new DateTime($created);
        $this->updated = new DateTime($updated);
        $this->validate = $validate;
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

    /**
     * Get the value of userId
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param int $userId
     *
     * @return self
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of validate
     *
     * @return int
     */
    public function getValidate(): int
    {
        return $this->validate;
    }

    /**
     * Set the value of validate
     *
     * @param int $validate
     *
     * @return self
     */
    public function setValidate(int $validate): self
    {
        $this->validate = $validate;

        return $this;
    }

    /**
     * Get the value of note
     *
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @param int $note
     *
     * @return self
     */
    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }
}

?>