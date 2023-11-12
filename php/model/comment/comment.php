<?php 

class Comment 
{
    private ?int $id;
    private int $userId; 
    private string $content; 
    private ?DateTime $posted;
    private int $validate;

    public function __construct($userId, $content)
    {
        $this->userId = $userId; 
        $this->content = $content;
        $this->validate = 0;
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
     * Get the value of posted
     *
     * @return DateTime
     */
    public function getPosted(): DateTime
    {
        return $this->posted;
    }

    /**
     * Set the value of posted
     *
     * @param DateTime $posted
     *
     * @return self
     */
    public function setPosted(DateTime $posted): self
    {
        $this->posted = $posted;

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
}

?>